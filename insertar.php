<?php $active='insertar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Insertar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <link href="assets/css/style.css" rel="stylesheet">

<!-- Animate.css -->
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
</style>

</head>
<body>
<?php include 'includes/navbar.php'; ?>

<main class="container my-4" style="opacity:0;">
  <div class="text-center mb-3">
    <h2>Insertar</h2>
    <p class="text-muted">Elige qué deseas registrar</p>
  </div>

  <div class="row g-3">
    <div class="col-md-6">
      <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-person-plus"></i> Insertar Observador</h5>
        <p class="small">Registra observaciones.</p>
        <a href="insertar_observador.php" class="btn btn-success">Ir</a>
      </div>
    </div>
    <div class="col-md-6">
    <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-person-plus"></i> Insertar Estudiante</h5>
        <p class="small">Registra estudiantes.</p>
        <a href="insertar_estudiante.php" class="btn btn-success">Ir</a>
      </div>
    </div>
    <div class="col-md-6">
    <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-person-plus"></i> Insertar Coordinador</h5>
        <p class="small">Registra coordinadores.</p>
        <a href="insertar_coordinador.php" class="btn btn-success">Ir</a>
      </div>
    </div>
     <div class="col-md-6">
      <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-journal-text"></i> Insertar Permiso</h5>
        <p class="small">Registra permisos o justificativos.</p>
        <a href="insertar_permiso.php" class="btn btn-success">Ir</a>
      </div>
    </div>
     <div class="col-md-6">
      <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-journal-text"></i> Insertar Materia</h5>
        <p class="small">Registra materias.</p>
        <a href="insertar_materia.php" class="btn btn-success">Ir</a>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-animated p-3 text-center">
        <h5><i class="bi bi-journal-text"></i> Insertar Notas</h5>
        <p class="small">Registra notas.</p>
        <a href="insertar_nota.php" class="btn btn-success">Ir</a>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
