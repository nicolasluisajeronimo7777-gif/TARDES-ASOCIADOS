<?php
$id_coordinador=$_POST['id_coordinador'];
$conexion=mysqli_connect("localhost","root","","tardes&asociados");
$sql="delete from coordinador where id_coordinador=$id_coordinador";
mysqli_query($conexion,$sql);
echo "<script type ='text/javascript'>
       alert('se borro el dato');
       window.location='consultar_coordinador.php';</script>";