<?php
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Conexión segura a la base de datos
  $conexion = new mysqli("localhost", "root", "", "tardes&asociados");
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  // Sanitizar y validar entradas
  $usuario = trim($_POST['usuario'] ?? '');
  $clave = trim($_POST['clave'] ?? '');
  $correo = trim($_POST['correo'] ?? '');

  if ($usuario !== '' && $clave !== '' && $correo !== '') {
    // Verificar si el usuario o correo ya existen
    $sql_check = "SELECT usuario, correo FROM usuarios WHERE usuario = ? OR correo = ?";
    $stmt_check = $conexion->prepare($sql_check);
    $stmt_check->bind_param("ss", $usuario, $correo);
    $stmt_check->execute();
    $resultado = $stmt_check->get_result();

    if ($resultado->num_rows > 0) {
      $mensaje = "El usuario o el correo ya están registrados.";
    } else {
      // Encriptar contraseña y registrar usuario
      $clave_hash = password_hash($clave, PASSWORD_DEFAULT);
      $sql_insert = "INSERT INTO usuarios (usuario, clave, correo) VALUES (?, ?, ?)";
      $stmt_insert = $conexion->prepare($sql_insert);
      $stmt_insert->bind_param("sss", $usuario, $clave_hash, $correo);

      if ($stmt_insert->execute()) {
        header("Location: login.php");
        exit;
      } else {
        $mensaje = "Error al registrar el usuario.";
      }

      $stmt_insert->close();
    }

    $stmt_check->close();
  } else {
    $mensaje = "Todos los campos son obligatorios.";
  }

  $conexion->close();
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Registro de Usuario</title>
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
    .register-card {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      animation: fadeInUp 1s;
      transition: all .3s;
    }
    .register-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.15);
    }
    .btn {
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease-in-out;
    }
    .btn::after {
      content: "";
      position: absolute;
      background: rgba(255,255,255,0.4);
      width: 100%;
      height: 100%;
      top: 0;
      left: -100%;
      transform: skewX(-45deg);
    }
    .btn:active::after {
      left: 100%;
      transition: left 0.5s ease-in-out;
    }
    .divider {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 15px 0;
      font-size: 0.9rem;
      color: #888;
    }
    .divider::before,
    .divider::after {
      content: '';
      flex: 1;
      border-bottom: 1px solid #ccc;
      margin: 0 10px;
    }
    .input-group-text {
      cursor: pointer;
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
  <div class="register-card text-center animate__animated animate__fadeInUp">
    <h4 class="mb-4"><i class="bi bi-person-plus"></i> Registro de Usuario</h4>

    <?php if ($mensaje): ?>
      <div id="alerta" class="alert alert-danger py-2"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
      <div class="mb-3 text-start">
        <label class="form-label">Nombre de usuario</label>
        <input type="text" name="usuario" class="form-control" required>
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Correo electrónico</label>
        <input type="email" name="correo" class="form-control" required>
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Contraseña</label>
        <div class="input-group">
          <input type="password" name="clave" id="clave" class="form-control" required minlength="6">
          <span class="input-group-text" onclick="togglePassword()" title="Mostrar/Ocultar contraseña">
            <i class="bi bi-eye-slash" id="icono-ojo"></i>
          </span>
        </div>
      </div>

      <button class="btn btn-success w-100 mb-3" type="submit">
        <i class="bi bi-person-check"></i> Registrarse
      </button>
    </form>

    <div class="divider">¿Ya tienes cuenta?</div>
    <a href="login.php" class="btn btn-primary w-100">
      <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
    </a>
  </div>

  <script>
    // Mostrar/ocultar contraseña
    function togglePassword() {
      const input = document.getElementById('clave');
      const icono = document.getElementById('icono-ojo');
      if (input.type === 'password') {
        input.type = 'text';
        icono.classList.replace('bi-eye-slash', 'bi-eye');
      } else {
        input.type = 'password';
        icono.classList.replace('bi-eye', 'bi-eye-slash');
      }
    }

    // Hace desaparecer la alerta automáticamente
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
