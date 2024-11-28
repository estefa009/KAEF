<?php
include("connection1.php");
$con = connection();

$cod_cliente = $_POST['cod_cliente'];
$cod_pago = $_POST['cod_pago'];
$fecha_hora = $_POST['fecha_hora'];
$cnt_vnt = $_POST['cnt_vnt'];
$descripcion = $_POST['descripcion'];
$prec_vent = $_POST['prec_vent'];
$precioIva_vent = $_POST['precioIva_vent'];
$preciTo_vent = $_POST['preciTo_vent'];

$sql = "INSERT INTO venta (cod_cliente, cod_pago, fecha_hora,cnt_vnt,descripcion,prec_vent,precioIva_vent,preciTo_vent) 
        VALUES ('$cod_cliente', '$cod_pago', '$fecha_hora','$cnt_vnt','$descripcion','$prec_vent','$precioIva_vent','$preciTo_vent')";
$query = mysqli_query($con, $sql);

if($query){
    echo "<script>
    alert('Registro exitoso.');
    setTimeout(function() {
        window.location.href = 'ventas.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
} else {
    echo "<script>
    alert('Ocurrió un error. Por favor, inténtalo de nuevo.');
    setTimeout(function() {
        window.location.href = 'ventas.php';
    }, 2000); // Redirige después de 2 segundos
    </script>";
}
