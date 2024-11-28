<?php
// Incluir el archivo de conexión
include('connection1.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $cntSalida = isset($_POST['cnt_salida']) ? intval($_POST['cnt_salida']) : null; 
    $codInsumo = isset($_POST['cod_insumo']) ? intval($_POST['cod_insumo']) : null; 

    // Comprobar si los valores son válidos
    if ($cntSalida > 0 && $codInsumo > 0) {
        // Crear la conexión a la base de datos
        $con = connection(); 

        // Obtener la cantidad actual desde la tabla de insumos
        $sqlSelectInsumo = "SELECT cnt_insumo FROM insumo WHERE cod_insumo = ?";
        $stmtSelectInsumo = $con->prepare($sqlSelectInsumo);
        $stmtSelectInsumo->bind_param("i", $codInsumo);
        $stmtSelectInsumo->execute();
        $stmtSelectInsumo->bind_result($cantidadInsumoActual);
        $stmtSelectInsumo->fetch();
        $stmtSelectInsumo->close();

        // Verificar si hay suficiente cantidad para salir
        if ($cantidadInsumoActual >= $cntSalida) {
            $nuevaCantidadInsumo = $cantidadInsumoActual - $cntSalida;

            // Actualizar la cantidad en la tabla de insumos
            $sqlUpdateInsumo = "UPDATE insumo SET cnt_insumo = ? WHERE cod_insumo = ?";
            $stmtUpdateInsumo = $con->prepare($sqlUpdateInsumo);
            $stmtUpdateInsumo->bind_param("ii", $nuevaCantidadInsumo, $codInsumo);
            $stmtUpdateInsumo->execute();

            // Insertar en la tabla de salidas
            $sqlInsertSalida = "INSERT INTO salida (cod_insumo, cnt_salida, fecha_hora_salida) VALUES (?, ?, NOW())";
            $stmtInsertSalida = $con->prepare($sqlInsertSalida);
            $stmtInsertSalida->bind_param("ii", $codInsumo, $cntSalida);
            if ($stmtInsertSalida->execute()) {
                header("Location: salidas.php?message=Salida registrada correctamente");
                exit();
            } else {
                echo "Error al registrar la salida: " . $stmtInsertSalida->error;
            }

            // Cerrar declaración de salidas
            $stmtInsertSalida->close();
        } else {
            echo "Error: No hay suficiente cantidad en el insumo.";
        }

        // Cerrar conexión
        $con->close();
    } else {
        echo "Por favor completa todos los campos.";
    }
}
?>


