<?php $active='consultar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>modificar observador</title>
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
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Observadores</h4>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>ID</th><th>Nombre</th><th>Identificación</th><th>Rol</th><th>Fecha</th><th>Hora</th><th>Descripción</th><th>Guardar</th></tr>
        </thead>
<?php
$id = $_POST['id'];
$conexion = mysqli_connect("localhost","root","","tardes&asociados");
$sql = "select id, nombre, identificacion, rol, fecha, hora, descripcion from observador where id=$id";
$tabla = mysqli_query($conexion,$sql);

echo "<form action='modificar_observador.php' method='post'>";
while($fila = mysqli_fetch_assoc($tabla)) {
    echo "<tr>";
    echo "<td>".$fila['id']."</td>";
    echo "<td><input type='text' name='nombre' value='".$fila['nombre']."'></td>";
    echo "<td><input type='text' name='identificacion' value='".$fila['identificacion']."'></td>";

    $roles = ["Estudiante","Docente","Auxiliar","Coordinador"];
    echo "<td><select name='rol'>";
    foreach($roles as $r){
        $selected = ($fila['rol'] == $r) ? "selected" : "";
        echo "<option value='$r' $selected>$r</option>";
    }
    echo "</select></td>";

    echo "<td><input type='date' name='fecha' value='".$fila['fecha']."'></td>";
    echo "<td><input type='time' name='hora' value='".$fila['hora']."'></td>";
    echo "<td><input type='text' name='descripcion' value='".$fila['descripcion']."'></td>";

    echo "<td>
            <input type='hidden' value='".$fila['id']."' name='id'>
            <input type='submit' class='btn-fourth' value='Guardar'>
          </td>";
    echo "</tr>";
}
echo "</form>";

if(isset($_POST['nombre'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $identificacion = $_POST['identificacion'];
    $rol = $_POST['rol'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $descripcion = $_POST['descripcion'];
    $conexion = mysqli_connect("localhost","root","","tardes&asociados");
    $guardar = "update observador set nombre='$nombre', identificacion='$identificacion', rol='$rol', fecha='$fecha', hora='$hora', descripcion='$descripcion' where id=$id";
    mysqli_query($conexion,$guardar);

    echo "<script type='text/javascript'>
            alert('actualizado correctamente');
            window.location='consultar_observador.php';
          </script>";
}
?>
      </table>
    </div>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>

