<?php
include("connection1.php");
$con = connection();

$nom_proveedor = $_POST['nom_proveedor'];
$telefono_proveedor = $_POST['telefono_proveedor'];
$novedad_proveedor = $_POST['novedad_proveedor'];

$sql = "INSERT INTO proveedor (nom_proveedor, telefono_proveedor, novedad_proveedor) 
        VALUES ('$nom_proveedor', '$telefono_proveedor', '$novedad_proveedor')";
$query = mysqli_query($con, $sql);

if($query){
    echo "<script>
    alert('Registro exitoso.');
    setTimeout(function() {
        window.location.href = 'proveedores.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
} else {
    echo "<script>
    alert('Ocurrió un error. Por favor, inténtalo de nuevo.');
    setTimeout(function() {
        window.location.href = 'proveedores.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
}
?>
