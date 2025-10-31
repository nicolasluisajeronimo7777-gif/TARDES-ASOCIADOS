<?php
// navbar.php
$active = $active ?? '';
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg,#2563eb,#06b6d4);">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <span class="logo-mark me-2">t&a</span>
      <i class="bi bi-clock-history me-2 float-icon" style="font-size:1.25rem"></i>
      <span>TARDES&ASOCIADOS</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto"></ul>

      <div class="d-flex align-items-center ms-3">
        <a href="login.php" class="btn btn-outline-light me-2 fw-semibold" style="border-radius: 20px; transition: all 0.3s ease;">Acceder</a>
        <a href="registro.php" class="btn fw-semibold" style="background-color: #fff; color: #2563eb; border-radius: 20px; transition: all 0.3s ease;">
          Crear una cuenta
        </a>
      </div>
    </div>
  </div>

  <style>
  .navbar-nav .nav-item .nav-link:hover {
    color: #ffd700 !important;
    transform: scale(1.05);
    text-shadow: 0 0 8px rgba(255,255,255,0.8);
  }
  .btn:hover {
    transform: scale(1.05);
    box-shadow: 0 0 8px rgba(255,255,255,0.5);
  }
  </style>
</nav>
