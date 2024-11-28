<?php
include("connection1.php"); 
$con = connection();
$id = $_GET["id"]; 
$sql = "DELETE FROM proveedor WHERE cod_proveedor='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: proveedores.php");
    exit();
} else {
    echo "<script>alert('Error al eliminar la categoría.'); window.location.href = 'proveedores.php';</script>";
}
?>
