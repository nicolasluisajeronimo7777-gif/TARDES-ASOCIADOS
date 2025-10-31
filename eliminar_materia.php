<?php
$id_materia=$_POST['id_materia'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from materia where id_materia=$id_materia";
mysqli_query($conexion,$sql);
echo "<script type='text/javascript'>
alert('Se borro el dato');
window.location='consultar_materia.php';</script>";
?>