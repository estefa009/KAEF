<?php
include('connection1.php');

$con = connection(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cod_proveedor = $_POST['cod_proveedor'];
    $nom_proveedor = $_POST['nom_proveedor'];
    $telefono_proveedor = $_POST['telefono_proveedor'];
    $novedad_proveedor = $_POST['novedad_proveedor'];


    $sql = "UPDATE proveedor SET nom_proveedor = ?, telefono_proveedor = ?, novedad_proveedor = ? WHERE cod_proveedor = ?";


    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {

        mysqli_stmt_bind_param($stmt, 'sisi', $nom_proveedor, $telefono_proveedor, $novedad_proveedor, $cod_proveedor);


        if (mysqli_stmt_execute($stmt)) {

            header("Location: proveedores.php?mensaje=proveedor actualizado con éxito");
            exit();
        } else {
            echo "Error al actualizar el proveedor: " . mysqli_error($con);
        }


        mysqli_stmt_close($stmt);
    } else {
        echo "Error al preparar la consulta: " . mysqli_error($con);
    }
}

// Cerrar la conexión
mysqli_close($con);
?>
