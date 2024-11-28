<?php
include('connection1.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Asegúrate de que estás utilizando los nombres correctos de las variables
    $cod_categoria = $_POST['cod_categoria']; // Cambia esto a 'cod_categoria'
    $nombre_categoria = $_POST['nombre_categoria']; // Asegúrate de que esto sea correcto

    // Corrige la consulta SQL
    $sql = "UPDATE categoriainsumo SET nom_categoria = ? WHERE cod_categoria = ?";

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        // Cambia 'sisi' a 'si' ya que solo necesitas 1 string y 1 integer
        mysqli_stmt_bind_param($stmt, 'si', $nombre_categoria, $cod_categoria); 

        if (mysqli_stmt_execute($stmt)) {
            header("Location: categoria.php?mensaje=categoria actualizada con éxito");
            exit();
        } else {
            echo "Error al actualizar la categoria: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($con);
    }
}

// Cerrar la conexión
mysqli_close($con);
?>
