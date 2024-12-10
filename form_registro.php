<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/registrate.css">
    <link rel="icon" href="icon/2.ico" type="image/x-ico">
</head>

<body>
    <div class="donasInicio">
        <img src="Images/hola.jpg" alt="donas Inicio">
    </div>
    <div class="formulario">
        <diV class="contenedorPrincipal shadow">
            <div class="row">
                <img src="Images/Profile.png" alt="Profile">
                <form id="form1" action="insert_user1.php" method="post"><br>
                    <div>
                        <input type="text" name="nom_usua" placeholder="Nombre" class="form-control shadow" required>
                        <input type="text" name="apell_usua" placeholder="Apellido" class="form-control shadow" required>
                        <input type="text" name="email_usua" placeholder="Correo" class="form-control shadow" required>
                        <input type="password" name="passw_usua" required placeholder="Clave"
                            class="form-control shadow"></label>
                        <input type="password" name="password2" required placeholder="Conf. Clave"
                            class="form-control shadow"></label>
                    </div>
                    <br>


                    <div class="forgot">
                        <input type="submit" value="REGISTRARME"  class="btn btn form mx-2 shadow">

                        <hr>
                        <h1><img src="Images/google.png" alt="google">Ingresar con Google</h1>
                    </div>

                </form>

            </div>
            

        </diV>
    </div>

</body>

</html>