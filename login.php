<?php
include("connection1.php");
$con = connection(); // Asegúrate de que esto sea correcto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email_usua']) && isset($_POST['password'])) {
        $email = mysqli_real_escape_string($con, $_POST['email_usua']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        // Consulta para verificar las credenciales del usuario
        $sql = "SELECT * FROM usuario WHERE email_usua='$email' AND passw_usua='$password'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Obtener el cod_usuario del usuario autenticado
            $user = mysqli_fetch_assoc($result);
            $cod_usuario = $user['cod_usuario']; // Asegúrate de que este campo exista en la tabla usuario

            // Consulta para verificar si el usuario es administrador
            $admin_sql = "SELECT * FROM administrador WHERE cod_usua='$cod_usuario'";
            $admin_result = mysqli_query($con, $admin_sql);

            if (mysqli_num_rows($admin_result) > 0) {
                // El usuario es un administrador
                header("Location: index.php"); // Redirige al dashboard de administrador
                exit();
            } 

            // Consulta para verificar si el usuario es domiciliario
            $domi_sql = "SELECT * FROM domiciliario WHERE cod_usua='$cod_usuario'";
            $domi_result = mysqli_query($con, $domi_sql);

            if (mysqli_num_rows($domi_result) > 0) {
                // El usuario es un domiciliario
                header("Location: Mis_Domicilios.php"); // Redirige al dashboard de domiciliario
                exit();
            } 

            // El usuario no es administrador ni domiciliario, redirigir como usuario normal
            header("Location: VistaCliente.html"); // Redirige al dashboard de usuario normal
            exit();
            
        } else {
            echo "Correo o contraseña incorrectos.";
        }
    } else {
        echo "Por favor, completa el formulario.";
    }
}

?>
