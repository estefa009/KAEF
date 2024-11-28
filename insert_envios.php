<?php
include("connection1.php");
$con = connection();

$cod_admin = $_POST['cod_admin'];
$cod_domi = $_POST['cod_domi'];
$cod_producto = $_POST['cod_producto'];
$fecha_hora_asignada = $_POST['fecha_hora_asignada'];

$sql = "INSERT INTO asignacionenvio (cod_admin, cod_domi, cod_producto,fecha_hora_asignada) 
        VALUES ('$cod_admin', '$cod_domi', '$cod_producto','$fecha_hora_asignada')";
$query = mysqli_query($con, $sql);

if($query){
    echo "<script>
    alert('Registro exitoso.');
    setTimeout(function() {
        window.location.href = 'envios.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
} else {
    echo "<script>
    alert('Ocurrió un error. Por favor, inténtalo de nuevo.');
    setTimeout(function() {
        window.location.href = 'envios.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
}

