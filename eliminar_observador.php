<?php
$id=$_POST['id'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from observador where id=$id";
mysqli_query($conexion,$sql);
echo "<script type='text/javascript'>
alert('Se borro el dato');
window.location='consultar_observador.php';</script>";
?>