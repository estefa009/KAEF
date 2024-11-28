¡<?php
       include("connection1.php"); 
$con = connection();
$id = $_GET["id"]; 
$sql = "DELETE FROM entradas WHERE cod_entrada='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location:entradas.php");
    exit();
} else {
    echo "<script>alert('Error al eliminar la entrada.'); window.location.href = 'entradas.php';</script>";
}
?>