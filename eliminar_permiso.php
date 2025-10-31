<?php
$id_persona=$_POST['id_persona'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from permisos where id_persona=$id_persona";
mysqli_query($conexion,$sql);
echo "<script type='text/javascript'>
alert('Se borro el dato');
window.location='consultar_permiso.php';</script>";
?>