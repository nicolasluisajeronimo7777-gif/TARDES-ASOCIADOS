<?php
session_start();

// Evita que las páginas se guarden en caché
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$active = $active ?? '';
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg,#2563eb,#06b6d4);">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <span class="logo-mark me-2">t&a</span>
      <i class="bi bi-clock-history me-2 float-icon" style="font-size:1.25rem"></i>
      <span>TARDES&ASOCIADOS</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link <?php if($active=='inicio') echo 'active'; ?>" href="index.php"><i class="bi bi-house-door-fill"></i> Inicio</a></li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if($active=='insertar') echo 'active'; ?>" href="#" data-bs-toggle="dropdown"> 
            <i class="bi bi-plus-circle"></i> Insertar
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="insertar_observador.php"><i class="bi bi-person-plus"></i> Insertar Observador</a></li>
            <li><a class="dropdown-item" href="insertar_estudiante.php"><i class="bi bi-person-plus"></i> Insertar Estudiante</a></li>
            <li><a class="dropdown-item" href="insertar_coordinador.php"><i class="bi bi-person-plus"></i> Insertar Coordinador</a></li>
            <li><a class="dropdown-item" href="insertar_permiso.php"><i class="bi bi-journal-text"></i> Insertar Permiso</a></li>
            <li><a class="dropdown-item" href="insertar_materia.php"><i class="bi bi-journal-text"></i> Insertar Materia</a></li>
            <li><a class="dropdown-item" href="insertar_nota.php"><i class="bi bi-journal-text"></i> Insertar Notas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="insertar.php"><i class="bi bi-folder-plus"></i> Vista Insertar</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?php if($active=='consultar') echo 'active'; ?>" href="#" data-bs-toggle="dropdown"> 
            <i class="bi bi-search"></i> Consultar
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="consultar_observador.php"><i class="bi bi-people"></i> Consultar Observador</a></li>
            <li><a class="dropdown-item" href="consultar_estudiante.php"><i class="bi bi-people"></i> Consultar Estudiante</a></li>
            <li><a class="dropdown-item" href="consultar_coordinador.php"><i class="bi bi-people"></i> Consultar Coordinador</a></li>
            <li><a class="dropdown-item" href="consultar_permiso.php"><i class="bi bi-file-earmark-text"></i> Consultar Permiso</a></li>
            <li><a class="dropdown-item" href="consultar_materia.php"><i class="bi bi-file-earmark-text"></i> Consultar Materia</a></li>
            <li><a class="dropdown-item" href="consultar_nota.php"><i class="bi bi-file-earmark-text"></i> Consultar Notas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="consultar.php"><i class="bi bi-folder2-open"></i> Vista Consultar</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if($active=='quienes') echo 'active'; ?>" href="quienes_somos.php">
            <i class="bi bi-info-circle"></i> Quienes Somos
          </a>
        </li>
      </ul>
    </div>
  </div>

  <!-- Usuario (ya logueado) -->
  <ul class="navbar-nav ms-auto" style="margin-right: 5px;"> 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle d-flex align-items-center px-2 fw-semibold" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="color: white; transition: all 0.3s ease;">
        <i class="bi bi-person-circle me-2 fs-4" style="color: #fff;"></i>
      </a>
      <ul class="dropdown-menu dropdown-menu-end text-center shadow" aria-labelledby="userDropdown" style="min-width: 180px; border-radius: 12px;">
        <li class="px-2 pt-2">
          <i class="bi bi-person-fill fs-1 text-primary"></i>
          <p class="mb-0 fw-semibold mt-1"><?= htmlspecialchars($_SESSION['usuario']); ?></p>
          <p class="text-muted mb-2" style="font-size: 0.85rem;">Usuario activo</p>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li>
          <a class="dropdown-item text-danger fw-semibold" href="logout.php">
            <i class="bi bi-box-arrow-right"></i> Abandonar sesión
          </a>
        </li>
      </ul>
    </li>
  </ul>

  <style>
  .navbar-nav .nav-item .nav-link:hover {
    color: #ffd700 !important;
    transform: scale(1.05);
    text-shadow: 0 0 8px rgba(255,255,255,0.8);
  }
  .dropdown-menu {
    animation: fadeIn 0.3s ease;
  }
  @keyframes fadeIn {
    from {opacity: 0; transform: translateY(-8px);}
    to {opacity: 1; transform: translateY(0);}
  }
  </style>
</nav>
