<?php $active='consultar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Consultar Observador</title>
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
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Permisos</h4>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light"><tr><th>ID</th><th>Tipo</th><th>Fecha</th><th>Aprobador</th><th>Motivo</th><th>Guardar</th></tr></thead>
<?php
$id_persona = $_POST['id_persona'];
$conexion = mysqli_connect("localhost","root","","tardes&asociados");
$sql = "select id_persona, fecha, tipo, motivo, aprobador from permisos where id_persona=$id_persona";
$tabla = mysqli_query($conexion,$sql);

echo "<form action='modificar_permiso.php' method='post'>";
while($fila = mysqli_fetch_assoc($tabla))
{
    echo "<tr>";
    echo "<td>".$fila['id_persona']."</td>";
    echo "<td><input type='date' name='fecha' value='".$fila['fecha']."'></td>";

    $tipos = ["Justificado","No Justificado"];
    echo "<td><select name='tipo'>";
    foreach($tipos as $t){
        $selected = ($fila['tipo'] == $t) ? "selected" : "";
        echo "<option value='$t' $selected>$t</option>";
    }
    echo "</select></td>";
    echo "<td><input type='text' name='aprobador' value='".$fila['aprobador']."'></td>";
    echo "<td><input type='text' name='motivo' value='".$fila['motivo']."'></td>";
    echo "<td>
            <input type='hidden' value='".$fila['id_persona']."' name='id_persona'>
            <input type='submit' class='btn-fourth' value='Guardar'>
          </td>";
    echo "</tr>";
}
echo "</form>";

if(isset($_POST['fecha']))
{
    $id_persona = $_POST['id_persona'];
    $fecha = $_POST['fecha'];
    $tipo = $_POST['tipo'];
    $motivo = $_POST['motivo'];
    $aprobador = $_POST['aprobador'];

    $conexion = mysqli_connect("localhost","root","","tardes&asociados");
    $guardar = "update permisos set fecha='$fecha', tipo='$tipo', motivo='$motivo', aprobador='$aprobador' where id_persona=$id_persona";
    mysqli_query($conexion,$guardar);

    echo "<script type='text/javascript'>
            alert('actualizado correctamente');
            window.location='consultar_permiso.php';
          </script>";
}
?>
 </table>
    </div>
  </div>
</main>
</body>
</html>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>