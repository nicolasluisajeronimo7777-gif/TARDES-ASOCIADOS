
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Insertar Coordinador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
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
  <div class="row justify-content-center">
    <div class="col-lg-8">
      
      
     
      
      
      

      <div class="card p-3">
        <h5><i class="bi bi-person-plus"></i> Insertar Coordinador</h5>
        <form method="post" class="row g-3 needs-validation" novalidate action="insertar_coordinador.php" method="POST">
          <div class="col-md-6">
            <label class="form-label">Nombre completo</label>
            <input class="form-control" name="nombre" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Apellido completo</label>
            <input class="form-control" name="apellido" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Cedula</label>
            <input class="form-control" name="cedula" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Cargo</label>
            <select name="cargo" class="form-select" required>
              <option value="">--</option>
              <option value="Academico">Academico</option>
              <option value="Convivencia">Convivencia</option>
            </select>
          </div>
           <div class="col-md-6">
            <label class="form-label">Jornada</label>
            <select name="jornada" class="form-select" required>
              <option value="">--</option>
              <option value="Mañana">Mañana</option>
              <option value="Tarde">Tarde</option>
              <option value="Sabatina">Sabatina</option>
              <option value="Nocturna">Nocturna</option>
            </select>
          </div>
         
          <div class="col-12 d-flex justify-content-between">
            <div><button class="btn btn-success" type="submit"><i class="bi bi-save"></i> Guardar</button></div>
            <div><a href="consultar_coordinador.php" class="btn btn-outline-primary">Ver Coordinadores</a></div>
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
$cargo=$_POST['cargo'];
$cedula=$_POST['cedula'];
$jornada=$_POST['jornada'];

$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$guardar="insert into coordinador(nombre, apellido, cargo, cedula, jornada)values('$nombre','$apellido','$cargo',$cedula,'$jornada')";
mysqli_query($conexion,$guardar);
echo "guardado correcatamente";
}
 ?>