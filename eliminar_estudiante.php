<?php
$id_estudiante=$_POST['id_estudiante'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from estudiante where id_estudiante=$id_estudiante";
mysqli_query($conexion,$sql);
echo "<script type ='text/javascript'>
       alert('se borro el dato');
       window.location='consultar_estudiante.php';</script>";