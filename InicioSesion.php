<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/InicioSesion.css">
    <link rel="icon" href="icon/2.ico" sizes="64x64" type="image/x-icon">

</head>
<body>
 
    <div class="donasInicio">
        <img src="Images/hola.jpg" alt="donas Inicio">
    </div>
    <div class="formulario">
        <div class="contenedorPrincipal shadow">
            <form action="login.php" method="POST" id="loginForm"> 
                <div class="row">
                    <img src="Images/Profile.png" alt="Profile">
                    <input type="text" name="email_usua" id="correo" class="form-control shadow" placeholder="Correo" required maxlength="50">
                    <input type="password" name="password" id="contraseña" class="form-control shadow" placeholder="Contraseña" required maxlength="50">
                    <div class="forgot">
                        <button type="button" class="btn-link pr-5">¿Olvidaste tu contraseña?</button>
                        <button type="submit" class="btn btn form mx-2 shadow">INICIAR SESIÓN</button>
                        <hr>
                        <h1><img src="Images/google.png" alt="google">Ingresar con Google</h1>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>