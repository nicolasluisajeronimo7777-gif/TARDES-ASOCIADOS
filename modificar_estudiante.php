<?php $active='consultar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Consultar Estudiante</title>
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
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Estudiantes</h4>
   
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light"><tr><th>ID</th><th>Nombre</th><th>Apellido</th><th>Grado</th><th>Correo</th><th>Telefono</th><th>Documento</th><th>Guardar</th></tr></thead>
        <tbody>
        	<?php
          $id_estudiante=$_POST['id_estudiante'];
            
          $conexion=mysqli_connect("localhost","root","","tardes&asociados");
          $sql="select id_estudiante, nombre, apellido, grado, correo, telefono, documento from Estudiante where id_estudiante=$id_estudiante";
          $tabla=mysqli_query($conexion,$sql);
          echo"<form action='modificar_estudiante.php'
                              method='POST'>";
          while($fila=mysqli_fetch_assoc($tabla))
                {
                echo "<tr>";
                      echo "<td>". $fila['id_estudiante']."</td>";
                      echo "<td><input type='text' name='nombre' value='". $fila['nombre']."'></td>";
                      echo "<td><input type='text' name='apellido' value='". $fila['apellido']."'></td>";
                      echo "<td><input type='text' name='grado' value='". $fila['grado']."'></td>";
                      echo "<td><input type='text' name='correo' value='". $fila['correo']."'></td>";
                      echo "<td><input type='text' name='telefono' value='". $fila['telefono']."'></td>";
                      echo "<td><input type='text' name='documento' value='". $fila['documento']."'></td>";
                        echo "<td>
                              <input type='hidden' value='".$fila['id_estudiante']."'name='id_estudiante'>
                              <input type='submit' class='btn-fourth' value='Guardar'>
                              </form></td>";
                          echo "</tr>";
                        }
                  if(isset($_POST['nombre']))
                  {
                  $id_estudiante=$_POST['id_estudiante'];
                  $nombre=$_POST['nombre'];
                  $apellido=$_POST['apellido'];
                  $grado=$_POST['grado'];
                  $correo=$_POST['correo'];
                  $telefono=$_POST['telefono'];
                  $documento=$_POST['documento'];

                  $conexion=mysqli_connect("localhost","root","","tardes&asociados");
                  $guardar="update estudiante set nombre='$nombre', apellido='$apellido', grado='$grado', correo='$correo', telefono=$telefono, documento=$documento where id_estudiante=$id_estudiante";
                  mysqli_query($conexion,$guardar);
                  echo "guardado correctamente";

                  echo "<script type ='text/javascript'>
                         alert('actualizado correctamente');
                         window.location='consultar_estudiante.php';</script>";
                  }?>

          
          
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
