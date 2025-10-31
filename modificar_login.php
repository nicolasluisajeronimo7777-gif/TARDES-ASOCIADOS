<?php
$mensaje = '';
$exito = false;
$mostrarCambio = false;

// Conexión segura con la base de datos
$conexion = new mysqli("localhost", "root", "", "tardes&asociados");
if ($conexion->connect_error) {
  die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = trim($_POST['usuario'] ?? '');
  $correo = trim($_POST['correo'] ?? '');

  // VERIFICAR USUARIO
  if (isset($_POST['verificar'])) {
    if ($usuario && $correo) {
      $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE usuario=? AND correo=?");
      $stmt->bind_param("ss", $usuario, $correo);
      $stmt->execute();
      $resultado = $stmt->get_result();

      if ($resultado->num_rows > 0) {
        $mostrarCambio = true;
        $mensaje = "✅ Usuario verificado. Ahora puedes cambiar tu contraseña.";
        $exito = true;
      } else {
        $mensaje = "❌ Usuario o correo incorrectos.";
      }
      $stmt->close();
    } else {
      $mensaje = "Por favor completa todos los campos.";
    }
  }

  // CAMBIAR CONTRASEÑA
  if (isset($_POST['cambiar'])) {
    $nueva_clave = trim($_POST['nueva_clave'] ?? '');
    if ($usuario && $correo && $nueva_clave) {
      $clave_hash = password_hash($nueva_clave, PASSWORD_DEFAULT);
      $stmt = $conexion->prepare("UPDATE usuarios SET clave=? WHERE usuario=? AND correo=?");
      $stmt->bind_param("sss", $clave_hash, $usuario, $correo);

      if ($stmt->execute() && $stmt->affected_rows > 0) {
        $mensaje = "🔒 Contraseña actualizada correctamente. Redirigiendo al inicio de sesión...";
        $exito = true;
        // Redirigir automáticamente después de 3 segundos
        echo "<meta http-equiv='refresh' content='3;url=login.php'>";
      } else {
        $mensaje = "⚠️ Error al actualizar la contraseña. Verifica tus datos.";
      }
      $stmt->close();
    } else {
      $mensaje = "Todos los campos son obligatorios.";
    }
  }
}
$conexion->close();
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
      background: linear-gradient(135deg, #e0f7fa, #e1bee7);
      background-attachment: fixed;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .card {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      animation: fadeInUp 1s;
    }
    @keyframes fadeInUp {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
    .fade-out {
      animation: fadeOut 1s forwards;
    }
    @keyframes fadeOut {
      from { opacity: 1; }
      to { opacity: 0; display: none; }
    }
  </style>
</head>
<body>
  <div class="card text-center animate__animated animate__fadeInUp">
    <h4 class="mb-4"><i class="bi bi-key"></i> Recuperar Contraseña</h4>

    <?php if ($mensaje): ?>
      <div id="alerta" class="alert <?= $exito ? 'alert-success' : 'alert-danger' ?> py-2">
        <?= htmlspecialchars($mensaje) ?>
      </div>
    <?php endif; ?>

    <?php if (!$mostrarCambio): ?>
    <!-- FORMULARIO DE VERIFICACIÓN -->
    <form method="post" autocomplete="off">
      <div class="mb-3 text-start">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>
      <div class="mb-3 text-start">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="correo" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100 mb-3" type="submit" name="verificar">
        <i class="bi bi-search"></i> Verificar Usuario
      </button>
    </form>
    <?php else: ?>
    <!-- FORMULARIO DE CAMBIO DE CONTRASEÑA -->
    <form method="post" autocomplete="off">
      <input type="hidden" name="usuario" value="<?= htmlspecialchars($usuario) ?>">
      <input type="hidden" name="correo" value="<?= htmlspecialchars($correo) ?>">
      <div class="mb-3 text-start">
        <label class="form-label">Nueva Contraseña</label>
        <div class="input-group">
          <input type="password" name="nueva_clave" id="nueva_clave" class="form-control" required minlength="8">
          <button class="btn btn-outline-secondary" type="button" id="verClave" title="Mostrar/Ocultar">
            <i class="bi bi-eye"></i>
          </button>
        </div>
        <div class="form-text text-muted">Debe tener al menos 8 caracteres.</div>
      </div>
      <button class="btn btn-success w-100 mb-3" type="submit" name="cambiar">
        <i class="bi bi-save"></i> Guardar Nueva Contraseña
      </button>
    </form>
    <?php endif; ?>

    <a href="login.php" class="btn btn-secondary w-100">
      <i class="bi bi-arrow-left"></i> Volver al Inicio de Sesión
    </a>
  </div>

  <script>
    // Mostrar / ocultar contraseña
    const btnVer = document.getElementById('verClave');
    const inputClave = document.getElementById('nueva_clave');
    if (btnVer && inputClave) {
      btnVer.addEventListener('click', () => {
        if (inputClave.type === 'password') {
          inputClave.type = 'text';
          btnVer.innerHTML = '<i class="bi bi-eye-slash"></i>';
        } else {
          inputClave.type = 'password';
          btnVer.innerHTML = '<i class="bi bi-eye"></i>';
        }
      });
    }

    // Hace desaparecer la alerta después de 3 segundos
    setTimeout(() => {
      const alerta = document.getElementById('alerta');
      if (alerta) {
        alerta.classList.add('fade-out');
        setTimeout(() => alerta.remove(), 1000);
      }
    }, 3000);
  </script>
</body>
</html>
