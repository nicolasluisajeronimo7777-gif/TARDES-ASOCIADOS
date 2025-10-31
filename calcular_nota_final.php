	<?php
$conexion = mysqli_connect("localhost","root","","tardes&asociados");

if (isset($_POST['id_materia'])) {
    $id_materia = $_POST['id_materia'];

    // Consulta para traer todas las notas de esa materia
    $sql = "SELECT nota, porcentaje FROM nota WHERE id_materia = $id_materia";
    $resultado = mysqli_query($conexion, $sql);

    $nota_final = 0;
    $suma_porcentajes = 0;

    // Calcula la suma ponderada
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $nota = floatval($fila['nota']);
        $porcentaje = floatval($fila['porcentaje']);
        $nota_final += ($nota * $porcentaje / 100);
        $suma_porcentajes += $porcentaje;
    }

    // Opcional: normaliza si los porcentajes no suman 100
    if ($suma_porcentajes > 0 && $suma_porcentajes != 100) {
        $nota_final = $nota_final * (100 / $suma_porcentajes);
    }

    // Actualiza la nota final en la tabla materia
    $update = "UPDATE materia SET nota_final = ROUND($nota_final, 2) WHERE id_materia = $id_materia";
    mysqli_query($conexion, $update);

    // Mensaje y redirección
    echo "<script>alert('Nota final calculada correctamente');
          window.location='consultar_materia.php';</script>";
}
?>
