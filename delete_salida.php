¡<?php
       include("connection1.php"); 
$con = connection();
$id = $_GET["id"]; 
$sql = "DELETE FROM salida WHERE cod_salida='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location:salidas.php");
    exit();
} else {
    echo "<script>alert('Error al eliminar la salida.'); window.location.href = 'salidas.php';</script>";
}
?>