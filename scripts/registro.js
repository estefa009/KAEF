function validarFormulario(){
    // Reiniciar mensaje de error
    document.getElementById("nombreError").textContent = "";
    document.getElementById("apellidoError").textContent = "";
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";
    document.getElementById("confirmarPasswordError").textContent = "";

    // Obtener los valores de los campos
    var nombre = document.getElementById("nombre").value.trim();
    var apellido = document.getElementById("apellido").value.trim();
    var correo = document.getElementById("email").value.trim();
    var password = document.getElementById("password").value.trim();
    var confirmPassword = document.getElementById("confirmarPassword").value.trim();

    // Validar nombre
    if (nombre === "") {
        document.getElementById("nombreError").textContent = "Por favor, ingresa tu nombre.";
        return;
    }

    // Validar apellido
    if (apellido === "") {
        document.getElementById("apellidoError").textContent = "Por favor, ingresa tu apellido.";
        return;
    }

    // Validar correo
    if (correo === "") {
        document.getElementById("emailError").textContent = "Por favor, ingrese su correo.";
        return;
    }

    // Validar contraseña
    if (password === "") {
        document.getElementById("passwordError").textContent = "Por favor, ingresa tu contraseña.";
        return;
    }

    // Validar confirmación de contraseña
    if (confirmPassword === "") {
        document.getElementById("confirmarPasswordError").textContent = "Por favor, confirma tu contraseña.";
        return;
    }

    // Comparar contraseñas
    if (password !== confirmPassword) {
        document.getElementById("confirmarPasswordError").textContent = "Las contraseñas no coinciden.";
        return;
    }

    // Guardar usuario en localStorage
    const user = { nombre, apellido, password };
    localStorage.setItem(nombre, JSON.stringify(user));
    alert('Te has registrado exitosamente');
    window.location.href = "index.html"; // Redirigir al formulario de inicio de sesión
}
