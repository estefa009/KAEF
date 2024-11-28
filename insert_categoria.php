<?php
include("connection1.php");
$con = connection();

$nom_categoria = $_POST['nom_categoria']; // Asegúrate de que el nombre sea correcto

$sql = "INSERT INTO categoriainsumo (nom_categoria) 
VALUES ('$nom_categoria')"; // No incluyas cod_categoria
$query = mysqli_query($con, $sql);

if ($query) {
    echo "<script>
    alert('Registro exitoso.');
    setTimeout(function() {
        window.location.href = 'categoria.php';
    }, 1000); // Redirige después de 1 segundos
    </script>";
} else {
    echo "<script>
    alert('Ocurrió un error. Por favor, inténtalo de nuevo.');
    setTimeout(function() {
        window.location.href = 'categoria.php';
    }, 1000); // Redirige después de 1 segundos
    </script>";
}
?>
