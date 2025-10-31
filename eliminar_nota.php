<?php
$id_nota=$_POST['id_nota'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from nota where id_nota=$id_nota";
mysqli_query($conexion,$sql);
echo "<script type='text/javascript'>
alert('Se borro el dato');
window.location='consultar_Nota.php';</script>";
?>