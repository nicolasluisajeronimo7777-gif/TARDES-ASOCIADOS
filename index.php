<?php $active='inicio'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Inicio - TARDES&ASOCIADOS</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Animate.css -->
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
</style>

</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="modal fade" id="welcomeModal" tabindex="-1" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-body text-center p-4"><h4 class="mb-2">¡Bienvenido!</h4><p class="mb-3">Explora el navegador de TARDES&ASOCIADOS.</p><button class="btn btn-creative ripple" data-bs-dismiss="modal">Comenzar</button></div></div></div></div>

<main class="container my-4" style="opacity:0;">
  <div class="row g-4 align-items-center hero p-3">
    <div class="col-lg-7">
      <img src="img/img_1.jpg" alt="Banner" class="img-fluid hero-img rounded">
    </div>
    <div class="col-lg-5">
      <h1 class="text-primary">Bienvenido</h1>
      <p class="lead">Bienvenido al sistema de TARDES&ASOCIADOS. Aquí puedes insertar y consultar observadores y permisos de forma rápida y segura.</p>
      <div class="d-flex gap-2">
        <a href="insertar.php" class="btn btn-creative btn-lg ripple"><i class="bi bi-plus-lg"></i> Insertar</a>
        <a href="consultar.php" class="btn btn-ghost btn-lg ripple"><i class="bi bi-search"></i> Consultar</a>
      </div>
          </div>
<div class="row mt-4 g-4 align-items-stretch">
  <div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Observadores</h6>
          <div class="h3 mb-0">
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from observador";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
        </div>
          <div class="small-muted">Registrados</div>
        </div>
        <div class="text-end">
          <i class="bi bi-people-fill display-4 text-primary"></i>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Permisos</h6>
          <div class="h3 mb-0"> 
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from permisos";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
         </div>
          <div class="small-muted">Este mes</div>
        </div>
        <div class="text-end">
          <i class="bi bi-journal-text display-4 text-warning"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4" style="position: absolute; margin-left:63%">
    <div class="chart-card">
      <h6 class="mb-2">Llegadas tarde (últimos 6 meses)</h6>
      <canvas id="chartCanvas" height="80"></canvas>
    </div>
  </div>
</div>

<div class="row mt-4">
<div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Estudiantes</h6>
          <div class="h3 mb-0"> 
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from estudiante";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
         </div>
          <div class="small-muted">Registrados</div>
        </div>
        <div class="text-end">
          <i class="bi bi-people-fill display-4 text-primary"></i>
        </div>
      </div>
    </div>
  </div>
    <div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Materias</h6>
          <div class="h3 mb-0"> 
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from materia";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
         </div>
          <div class="small-muted">Este periodo</div>
        </div>
        <div class="text-end">
          <i class="bi bi-journal-text display-4 text-warning"></i>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row mt-4">
  <div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Coordinadores</h6>
          <div class="h3 mb-0"> 
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from coordinador";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
         </div>
          <div class="small-muted">Registrados</div>
        </div>
        <div class="text-end">
          <i class="bi bi-people-fill display-4 text-primary"></i>
        </div>
      </div>
    </div>
  </div>
    <div class="col-md-4">
    <div class="stat-card">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <h6 class="mb-1">Notas</h6>
          <div class="h3 mb-0"> 
            <?php
              $conexion = mysqli_connect("localhost", "root", "", "tardes&asociados");
              $sql = "select count(*) from nota";
              $tabla = mysqli_query($conexion, $sql);
              $fila = mysqli_fetch_assoc($tabla);
              echo $fila['count(*)'];  
           ?>   
         </div>
          <div class="small-muted">Este periodo</div>
        </div>
        <div class="text-end">
          <i class="bi bi-journal-text display-4 text-warning"></i>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-4">
      <div class="card card-animated p-3">
        <div class="d-flex align-items-center">
          <i class="bi bi-person-check-fill display-5 text-success me-3"></i>
          <div>
            <h5>Observadores</h5>
            <p class="mb-0">Registra y administra observadores.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-animated p-3">
        <div class="d-flex align-items-center">
          <i class="bi bi-journal-text display-5 text-warning me-3"></i>
          <div>
            <h5>Permisos</h5>
            <p class="mb-0">Registra permisos de llegadas tarde.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-animated p-3">
        <div class="d-flex align-items-center">
          <i class="bi bi-clock-history display-5 text-danger me-3"></i>
          <div>
            <h5>Incidencias</h5>
            <p class="mb-0">Monitorea situaciones críticas.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

<!-- Modal Bienvenida -->
<div class="modal fade animate__animated animate__fadeInDown" id="welcomeModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4">
      <h2 class="text-primary"><i class="bi bi-clock"></i> ¡Bienvenido!</h2>
      <p class="mt-3">Este es el sistema creativo de gestión de llegadas tarde 🎉</p>
      <button type="button" class="btn btn-success mt-2" data-bs-dismiss="modal">Comenzar</button>
    </div>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var myModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
    myModal.show();
});
</script>

</body>
</html>