<?php $active='insertar'; $submitted=false; $errors=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
  $materia = trim($_POST['materia'] ?? '');
  $fecha = trim($_POST['fecha'] ?? '');
  $profesor = trim($_POST['profesor'] ?? '');
  if($materia==='') $errors[]='Materia obligatoria.';
  if($fecha==='') $errors[]='Fecha obligatoria.';
  if($profesor==='') $errors[]='Profesor obligatoria.';
  if(empty($errors)) $submitted=true;
  $conexion=mysqli_connect("localhost","root","","tardes&asociados");
  $guardar="insert into materia(materia,fecha,profesor)values('$materia','$fecha','$profesor')";
  mysqli_query($conexion,$guardar);
}
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Insertar Materia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
  <link href="assets/css/style.css" rel="stylesheet">

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
  <div class="row justify-content-center">
    <div class="col-lg-8">
        
       <div class="card p-3">
        <h5><i class="bi bi-person-plus"></i> Insertar Materia</h5>
        <form method="post" class="row g-3 needs-validation" novalidate>
          <div class="col-md-6">
            <label class="form-label">Materia</label>
            <select name="materia" class="form-select" required>
              <option value="">--</option>
              <option value="Fisica">Fisica</option>
              <option value="Quimica">Quimica</option>
              <option value="Comportamiento">Comportamiento</option>
              <option value="Artes">Artes</option>
              <option value="Ed.fisica">Ed.fisica</option>
              <option value="Filosofia">Filosofia</option>
              <option value="Español">Español</option>
              <option value="Matematicas">Matematicas</option>
              <option value="Tecnologia">Tecnologia</option>
              <option value="Ingles">Ingles</option>
              <option value="Etica">Etica</option>
              <option value="Sociales">Sociales</option>
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">Fecha</label>
            <input type="date" class="form-control" name="fecha" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Profesor</label>
            <input class="form-control" name="profesor" required>
          </div>
          <div class="col-12">
          <div class="col-12 d-flex justify-content-between">
            <div><button class="btn btn-success" type="submit"><i class="bi bi-save"></i> Guardar</button></div>
            <div><a href="consultar_materia.php" class="btn btn-outline-primary">Ver Materias</a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
(() => {
  'use strict'
  const forms = document.querySelectorAll('.needs-validation')
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
</html>
