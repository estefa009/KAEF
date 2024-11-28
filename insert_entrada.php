<?php
// Incluir el archivo de conexión
include('connection1.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $codProveedor = $_POST['cod_proveedor'] ?? null; // Código del proveedor
    $cntEntrada = $_POST['cnt_entrada'] ?? null; // Cantidad de entrada
    $fechaCaducidad = $_POST['fecha_caducidad'] ?? null; // Fecha de caducidad
    $codInsumo = $_POST['cod_insumo'] ?? null; // Código del insumo

    // Comprobar si los valores son válidos
    if ($cntEntrada > 0 && $codInsumo > 0) {
        // Crear la conexión a la base de datos
        $con = connection();

        // Insertar nueva entrada en la tabla de entradas
        $sqlInsertEntradas = "INSERT INTO entradas (cod_proveedor, cod_insumo, cnt_entrada, fecha_caducidad) VALUES (?, ?, ?, ?)";
        $stmtInsertEntradas = $con->prepare($sqlInsertEntradas);
        $stmtInsertEntradas->bind_param("iiis", $codProveedor, $codInsumo, $cntEntrada, $fechaCaducidad);

        // Comprobar si la inserción de entradas fue exitosa
        if ($stmtInsertEntradas->execute()) {
            // Actualizar la tabla de insumos
            $sqlSelectInsumo = "SELECT cnt_insumo FROM insumo WHERE cod_insumo = ?";
            $stmtSelectInsumo = $con->prepare($sqlSelectInsumo);
            $stmtSelectInsumo->bind_param("i", $codInsumo);
            $stmtSelectInsumo->execute();
            $stmtSelectInsumo->bind_result($cantidadInsumoActual);
            $stmtSelectInsumo->fetch();
            $stmtSelectInsumo->close();

            // Sumar la nueva cantidad a la cantidad actual en insumos
            $nuevaCantidadInsumo = ($cantidadInsumoActual ?? 0) + $cntEntrada;

            // Actualizar la cantidad en la tabla de insumos
            $sqlUpdateInsumo = "UPDATE insumo SET cnt_insumo = ? WHERE cod_insumo = ?";
            $stmtUpdateInsumo = $con->prepare($sqlUpdateInsumo);
            $stmtUpdateInsumo->bind_param("ii", $nuevaCantidadInsumo, $codInsumo);

            // Comprobar si la actualización de insumos fue exitosa
            if ($stmtUpdateInsumo->execute()) {
                // Redirigir con mensaje de éxito
                header("Location: entradas.php?message=Entrada agregada correctamente");
                exit(); // Detener el script después de redirigir
            } else {
                echo "Error en la actualización de insumos: " . $stmtUpdateInsumo->error; // Muestra el error si falla la actualización de insumos
            }

            // Cerrar declaración de insumos
            $stmtUpdateInsumo->close();
        } else {
            echo "Error en la inserción de entradas: " . $stmtInsertEntradas->error; // Muestra el error si falla la inserción de entradas
        }

        // Cerrar declaración y conexión
        $stmtInsertEntradas->close();
        $con->close();
    } else {
        echo "Por favor completa todos los campos."; // Mensaje si hay campos vacíos
    }
}
?>
