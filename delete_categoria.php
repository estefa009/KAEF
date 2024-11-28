<?php
include("connection1.php"); 
$con = connection();
$id = $_GET["id"]; 
$sql = "DELETE FROM categoriainsumo WHERE cod_categoria='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: categoria.php");
    exit();
} else {
    echo "<script>alert('Error al eliminar la categoría.'); window.location.href = 'categoria.php';</script>";
}
?>
