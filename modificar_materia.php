<?php $active='consultar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Modificar Materia</title>
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
    <h4>Materias</h4>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <th>ID</th><th>Materia</th><th>Fecha</th><th>Profesor</th><th>Nota Final</th><th>Guardar</th>
        </thead>
        <tbody>
          <?php 
   $id_materia=$_POST['id_materia'];       
  $conexion=mysqli_connect("localhost","root","","tardes&asociados");
  $sql="SELECT id_materia, materia, fecha, profesor, nota_final FROM materia WHERE id_materia=$id_materia";
  $tabla=mysqli_query($conexion,$sql);
 echo "<form action='modificar_materia.php' method='POST'>";

    while($fila=mysqli_fetch_assoc($tabla))
  {
    echo "<tr>";
         echo "<td>".$fila['id_materia']."</td>";

         $materia = ["Fisica","Quimica","Comportamiento","Artes","Ed.fisica","Filosofia","Español","Matematicas","Tecnologia","Ingles","Etica","Sociales"];
         echo "<td><select name='materia'>";
         foreach($materia as $r){
             $selected = ($fila['materia'] == $r) ? "selected" : "";
             echo "<option value='$r' $selected>$r</option>";
         }
         echo "</select></td>";

         echo "<td><input type='date' name='fecha' value='".$fila['fecha']."'></td>";
         echo "<td><input type='text' name='profesor' value='".$fila['profesor']."'></td>";
         echo "<td><input type='numeric' name='nota_final' value='".$fila['nota_final']."'></td>";
         echo "<td>
                <input type='hidden' value='".$fila['id_materia']."' name='id_materia'>
                <input type='submit' class='btn-fourth' value='Guardar'>
              </td>";
        echo "</tr>";
     }
echo "</form>"; // 🔧 cierre del form movido fuera del while para evitar errores de validación

if(isset($_POST['materia']))
{
$id_materia=$_POST['id_materia'];
$materia=$_POST['materia'];
$fecha=$_POST['fecha'];
$profesor=$_POST['profesor'];
$nota_final=$_POST['nota_final'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$guardar="UPDATE materia SET materia='$materia', fecha='$fecha', profesor='$profesor', nota_final='$nota_final' WHERE id_materia=$id_materia";
mysqli_query($conexion,$guardar);

echo "<script type='text/javascript'>
 alert('Actualizado Correctamente');
 window.location='consultar_materia.php';
 </script>";
}
     ?>

        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
