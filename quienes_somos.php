<?php $active='quienes'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Quienes Somos</title>
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

<div class="container my-5">
  <!-- Sección de bienvenida -->
  <div class="text-center mb-5">
    <h2 class="text-primary fw-bold">🌟 Quiénes Somos</h2>
    <p class="lead">Somos una institución comprometida con la formación integral de nuestros estudiantes y con la gestión eficiente de las <strong>llegadas tarde</strong>, fomentando la responsabilidad y el respeto.</p>
  </div>

  <!-- Imagen principal -->
  <div class="text-center mb-5">
    <img src="https://picsum.photos/900/300?random=1" alt="Institución educativa" class="img-fluid rounded shadow">
  </div>

  <!-- Misión y visión -->
  <div class="row text-center mb-5">
    <div class="col-md-6 mb-4">
      <div class="card shadow h-100 border-0">
        <div class="card-body">
          <h4 class="text-success fw-bold">🎯 Misión</h4>
          <p>Formar estudiantes responsables y comprometidos con sus deberes académicos, implementando un sistema de control eficiente para reducir las llegadas tarde y fortalecer los valores institucionales.</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="card shadow h-100 border-0">
        <div class="card-body">
          <h4 class="text-warning fw-bold">🚀 Visión</h4>
          <p>Ser una institución modelo en la gestión del tiempo y la disciplina, utilizando herramientas tecnológicas modernas para garantizar el desarrollo académico y personal de nuestros estudiantes.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Nuestro equipo -->
  <div class="mb-5">
    <h3 class="text-center text-primary fw-bold mb-4">👨‍🏫 Nuestro Equipo</h3>
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img src="https://randomuser.me/api/portraits/men/32.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width:120px; height:120px; object-fit:cover;" alt="Coordinador">
          <div class="card-body">
            <h5 class="fw-bold">Carlos Ramírez</h5>
            <p class="text-muted">Coordinador Académico</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img src="https://randomuser.me/api/portraits/women/45.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width:120px; height:120px; object-fit:cover;" alt="Orientadora">
          <div class="card-body">
            <h5 class="fw-bold">María Torres</h5>
            <p class="text-muted">Orientadora Escolar</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card border-0 shadow h-100">
          <img src="https://randomuser.me/api/portraits/men/67.jpg" class="card-img-top rounded-circle mx-auto mt-3" style="width:120px; height:120px; object-fit:cover;" alt="Docente">
          <div class="card-body">
            <h5 class="fw-bold">Luis Fernández</h5>
            <p class="text-muted">Docente Líder</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Frase motivadora -->
  <div class="text-center bg-light p-5 rounded shadow-sm">
    <blockquote class="blockquote">
      <p class="mb-0 fs-4">“La puntualidad es el respeto por el tiempo de los demás.”</p>
      <footer class="blockquote-footer mt-2">Anónimo</footer>
    </blockquote>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>