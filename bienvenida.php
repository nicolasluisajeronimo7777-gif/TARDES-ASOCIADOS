<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenido - TARDES&ASOCIADOS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <style>
    body {
              background: linear-gradient(135deg, #e0f7fa, #e1bee7);
        background-attachment: fixed;
    }
    .navbar {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
    }
    .card {
        transition: transform .2s, box-shadow .2s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    }
    .btn {
        position: relative;
        overflow: hidden;
    }
    .btn::after {
        content: "";
        position: absolute;
        background: rgba(255,255,255,0.4);
        display: block;
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
    .footer {
        background: linear-gradient(90deg, #212529, #343a40);
        color: white;
        padding: 20px 0;
    }
    .footer a {
        color: #adb5bd;
        text-decoration: none;
    }
    .footer a:hover {
        color: #fff;
      }
    .hero {
      background: linear-gradient(90deg, #f8fafc, #f3e8ff);
      border-radius: 20px;
      padding: 3rem 2rem;
      margin-top: 2rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-around;
    }
    .hero img {
      max-width: 300px;
      border-radius: 12px;
    }
    .hero h1 {
      color: #2563eb;
      font-weight: 700;
    }

    /* Botón degradado Registrarse */
    .btn-insertar {
      background: linear-gradient(to right, #06b6d4, #6366f1);
      color: #fff;
      border: none;
      border-radius: 8px;
      font-weight: 600;
      padding: 0.6rem 1.5rem;
      transition: all 0.3s ease;
    }
    .btn-insertar:hover {
      opacity: 0.9;
      transform: scale(1.02);
    }

    /* Botón Iniciar Sesión con borde */
    .btn-login {
      background-color: #ffffff;
      color: #111827;
      border: 1.5px solid #e5e7eb;
      border-radius: 8px;
      font-weight: 600;
      padding: 0.6rem 1.5rem;
      display: flex;
      align-items: center;
      gap: 8px;
      transition: all 0.3s ease;
    }
    .btn-login:hover {
      background-color: #f3f4f6;
      transform: scale(1.02);
    }
    .btn-login img {
      width: 24px;
      height: 24px;
      border-radius: 50%;
    }

    .card {
      border: none;
      border-radius: 16px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      background-color: white;
    }
    .card:hover {
      transform: translateY(-5px);
    }
    .icon {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }
  </style>
</head>
<body>
<?php include 'includes/navbar_2.php';?>
<div class="container">
  <div class="hero">
    <img src="https://cdn-icons-png.flaticon.com/512/8115/8115321.png" alt="Estudiante corriendo">
    <div class="text-start mt-4 mt-md-0" style="max-width: 500px;">
      <h1>Bienvenido</h1>
      <p class="text-secondary">
        Bienvenido al sistema de <strong>TARDES&ASOCIADOS</strong>. Aquí puedes insertar y consultar observadores y permisos de forma rápida y segura.
        Nuestro compromiso es brindar eficiencia, puntualidad y herramientas digitales modernas para las instituciones educativas.
      </p>
      <div class="d-flex gap-2">
        <a href="registro.php" class="btn btn-insertar"><i class="bi bi-plus-lg"></i> Registrarse</a>
        <a href="login.php" class="btn btn-login">
          <span class="login-text">Acceder</span>
        </a>
      </div>
    </div>
  </div>

  <div class="row mt-5 g-4">
    <div class="col-md-4">
      <div class="card text-center p-4">
        <i class="bi bi-people-fill text-primary icon"></i>
        <h5 class="fw-bold">Compromiso</h5>
        <p class="text-muted">Nos enfocamos en ofrecer soluciones confiables para el control académico y la gestión del tiempo institucional.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center p-4">
        <i class="bi bi-laptop text-success icon"></i>
        <h5 class="fw-bold">Gestión Digital</h5>
        <p class="text-muted">Facilitamos la digitalización de los procesos administrativos, eliminando el papel y mejorando la trazabilidad.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-center p-4">
        <i class="bi bi-graph-up text-warning icon"></i>
        <h5 class="fw-bold">Eficiencia</h5>
        <p class="text-muted">Optimiza tus procesos internos, reduciendo tiempos y mejorando la productividad institucional.</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<?php include 'includes/footer_2.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
