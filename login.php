<?php
session_start();
$mensaje = '';
$usuario_guardado = '';

// Si el usuario ya inició sesión, redirige directamente
if (isset($_SESSION['usuario'])) {
  header("Location: index.php");
  exit();
}

// Procesa el formulario al enviar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = trim($_POST['usuario'] ?? '');
  $clave = $_POST['clave'] ?? '';
  $usuario_guardado = htmlspecialchars($usuario);

  // Conexión segura a la base de datos
  $conexion = new mysqli("localhost", "root", "", "tardes&asociados");
  if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
  }

  // Consulta segura usando prepared statements
  $sql = "SELECT usuario, clave FROM usuarios WHERE usuario = ?";
  $stmt = $conexion->prepare($sql);
  $stmt->bind_param("s", $usuario);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();

    if (password_verify($clave, $fila['clave'])) {
      // Iniciar sesión y regenerar ID por seguridad
      session_regenerate_id(true);
      $_SESSION['usuario'] = $fila['usuario'];
      header('Location: index.php');
      exit;
    } else {
      $mensaje = 'Usuario o contraseña incorrectos.';
    }
  } else {
    $mensaje = 'Usuario o contraseña incorrectos.';
  }

  $stmt->close();
  $conexion->close();
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inicio de Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <link href="assets/css/style.css" rel="stylesheet">
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
    .login-card {
      width: 100%;
      max-width: 400px;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
      animation: fadeInUp 1s;
    }
    .login-card:hover {
      transform: translateY(-5px);
      transition: all .3s;
    }
    .btn {
      position: relative;
      overflow: hidden;
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
    .fade-out {
      animation: fadeOut 1s forwards;
    }
    @keyframes fadeOut {
      from { opacity: 1; }
      to { opacity: 0; display: none; }
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
    .forgot {
      display: block;
      text-align: right;
      font-size: 0.9rem;
      color: #0d6efd;
      text-decoration: none;
      margin-bottom: 10px;
      transition: color 0.3s;
    }
    .forgot:hover {
      color: #084298;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-card text-center animate__animated animate__fadeInUp">
    <h4 class="mb-4"><i class="bi bi-person-circle"></i> Inicio de Sesión</h4>

    <?php if ($mensaje): ?>
      <div id="alerta" class="alert alert-danger py-2"><?= htmlspecialchars($mensaje) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
      <div class="mb-3 text-start">
        <label class="form-label">Usuario</label>
        <input type="text" name="usuario" class="form-control" value="<?= $usuario_guardado ?>" required>
      </div>

      <div class="mb-3 text-start">
        <label class="form-label">Contraseña</label>
        <div class="input-group">
          <input type="password" name="clave" id="clave" class="form-control" required>
          <span class="input-group-text" id="toggleClave"><i class="bi bi-eye-slash"></i></span>
        </div>
      </div>

      <a href="modificar_login.php" class="forgot">¿Olvidaste tu contraseña?</a>

      <button class="btn btn-primary w-100 mb-3" type="submit">
        <i class="bi bi-box-arrow-in-right"></i> Ingresar
      </button>
    </form>

    <div class="divider">¿No tienes cuenta?</div>
    <a href="registro.php" class="btn btn-success w-100">
      <i class="bi bi-person-plus"></i> Registrarse
    </a>
  </div>

  <script>
    // Mostrar/ocultar contraseña
    const toggleClave = document.getElementById('toggleClave');
    const claveInput = document.getElementById('clave');
    toggleClave.addEventListener('click', () => {
      const icon = toggleClave.querySelector('i');
      if (claveInput.type === 'password') {
        claveInput.type = 'text';
        icon.classList.replace('bi-eye-slash', 'bi-eye');
      } else {
        claveInput.type = 'password';
        icon.classList.replace('bi-eye', 'bi-eye-slash');
      }
    });

    // Desaparecer alerta automáticamente
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
