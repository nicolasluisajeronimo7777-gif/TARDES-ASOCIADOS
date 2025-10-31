<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Insertar Estudiante</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.svg" type="image/svg+xml">
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
        <h5><i class="bi bi-person-plus"></i>Insertar Estudiante</h5>
        <form class="row g-3 needs-validation" novalidate action="insertar_estudiante.php" method="POST">
          <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input class="form-control" name="nombre" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Apellido</label>
            <input class="form-control" name="apellido" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Grado</label>
            <input class="form-control" name="grado" required>
          </div>
         <div class="col-md-6">
            <label class="form-label">Correo</label>
            <input class="form-control" name="correo" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Telefono</label>
            <input class="form-control" name="telefono" required>
          </div>
           <div class="col-md-6">
            <label class="form-label">Documento</label>
            <input class="form-control" name="documento" required>
          </div>
         
          <div class="col-12 d-flex justify-content-between">
            <div><button class="btn btn-success" type="submit"><i class="bi bi-save"></i> Guardar</button></div>
            <div><a href="consultar_estudiante.php" class="btn btn-outline-primary">Ver Estudiantes</a></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>

</body>
</html>
<?php 
if (isset($_POST['nombre']))
{
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$grado=$_POST['grado'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$documento=$_POST['documento'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$guardar="insert into estudiante(nombre, apellido, grado, correo, telefono, documento)values('$nombre','$apellido','$grado','$correo','$telefono','$documento')";
mysqli_query($conexion,$guardar);
echo "guardado correctamente";
}
 ?>