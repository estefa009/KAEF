<?php
// Incluir el archivo de conexión
include('connection1.php');

// Llamar a la función de conexión
$con = connection(); // Asignar el resultado a la variable $con

// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $cod_insumo = $_POST['cod_insumo'];
    $nombre_insumo = $_POST['nombre_insumo'];
    $cantidad_insumo = $_POST['cantidad_insumo'];
    $cod_categoria = $_POST['cod_categoria'];

    // Preparar la consulta para actualizar el insumo
    $sql = "UPDATE insumo SET nomb_insumo = ?, cnt_insumo = ?, cod_categoria = ? WHERE cod_insumo = ?";

    // Preparar la sentencia
    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        // Vincular parámetros
        mysqli_stmt_bind_param($stmt, 'sisi', $nombre_insumo, $cantidad_insumo, $cod_categoria, $cod_insumo);

        // Ejecutar la sentencia
        if (mysqli_stmt_execute($stmt)) {
            // Redireccionar a la página de insumos con un mensaje de éxito
            header("Location: insumos.php?mensaje=Insumo actualizado con éxito");
            exit();
        } else {
            echo "Error al actualizar el insumo: " . mysqli_error($con);
        }

        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($con);
    }
}

// Cerrar la conexión
mysqli_close($con);
?>
