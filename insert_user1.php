<?php
include("connection1.php");
$con = connection();
$nom_usua = $_POST['nom_usua'];
$apell_usua = $_POST['apell_usua'];
$email_usua = $_POST['email_usua'];
$passw_usua = $_POST['passw_usua'];
$password2 = $_POST['password2'];


if ($passw_usua === $password2) {
   
  $sql = "INSERT INTO usuario (nom_usua, apell_usua,  email_usua, passw_usua) 
  VALUES ('$nom_usua', '$apell_usua', '$email_usua', '$passw_usua')";
$query = mysqli_query($con, $sql);
if($query){
  
  echo "<script>
  alert('registro exitoso.');
  setTimeout(function() {
      window.location.href = 'InicioSesion.php';
  },00001); // Redirige después de 2 segundos
</script>";
}
} else {
   echo "<script>
    alert('Las contraseñas no coinciden. Por favor, inténtalo de nuevo.');
    setTimeout(function() {
        window.location.href = 'form_registro.php';
    },00001); // Redirige después de 2 segundos
  </script>";
}

