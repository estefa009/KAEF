¡<?php
       include("connection1.php"); 
$con = connection();
$id = $_GET["id"]; 
$sql = "DELETE FROM insumo WHERE cod_insumo='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location:insumos.php");
    exit();
} else {
    echo "<script>alert('Error al eliminar el insumo.'); window.location.href = 'insumos.php';</script>";
}
?>