<?php
// Incluir el archivo de conexión
include('connection1.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores del formulario
    $nombInsumo = $_POST['nomb_insumo'] ?? null; // Nombre del insumo
    $cntInsumo = $_POST['cnt_insumo'] ?? null; // Cantidad del insumo
    $codCategoria = $_POST['cod_categoria'] ?? null; // Código de la categoría

    // Comprobar si los valores son válidos
    if (!empty($nombInsumo) && !empty($cntInsumo) && !empty($codCategoria)) {
        // Crear la conexión a la base de datos
        $con = connection(); // Asume que tu función de conexión retorna la conexión

        // Consulta para insertar en la tabla correspondiente
        $sql = "INSERT INTO insumo (nomb_insumo, cnt_insumo, cod_categoria) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("sii", $nombInsumo, $cntInsumo, $codCategoria); // Ajusta los tipos según tu base de datos

        if ($stmt->execute()) {
            header("Location: insumos.php?message=Insumo agregado correctamente");
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $con->close();
    } else {
        echo "Por favor completa todos los campos.";
    }
}
?>
