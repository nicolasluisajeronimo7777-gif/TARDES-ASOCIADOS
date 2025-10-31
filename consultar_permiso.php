<?php $active='consultar'; ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Consultar Permiso</title>
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
    <a href="insertar_permiso.php" class="btn btn-success">Nuevo</a>
  </div>
  <div class="card">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light"><tr><th>ID</th><th>Fecha</th><th>Tipo</th><th>Aprobador</th><th>Motivo</th><th>Modicar</th><th>Eliminar</th></tr></thead>
<?php
 
 $conexion=mysqli_connect("localhost","root","","tardes&asociados");
 $sql="select id_persona, fecha, tipo, motivo, aprobador from permisos";
 $tabla=mysqli_query($conexion,$sql);
 while($fila=mysqli_fetch_assoc($tabla))
    {
        echo "<tr>";
         echo "<td>".$fila['id_persona']."</td>";
         echo "<td>".$fila['fecha']."</td>";
         echo "<td><span class='badge bg-primary'>".$fila['tipo']."</td>";
         echo "<td>".$fila['aprobador']."</td>";
         echo "<td>".$fila['motivo']."</td>";
         echo "<td>
                <form action='modificar_permiso.php'
                   method='POST'>
                <input type='hidden' value='".$fila['id_persona']."'
                    name='id_persona'>
                <input type='submit' class='btn-secundary' value='Modificar'>
                </form></td>";

         echo "<td>
                <form action='eliminar_permiso.php'
                   method='POST'>
                <input type='hidden' value='".$fila['id_persona']."'
                    name='id_persona'>
                <input type='submit' class='btn-third' value='Eliminar'>
                </form></td>";

        echo "</tr>";
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
