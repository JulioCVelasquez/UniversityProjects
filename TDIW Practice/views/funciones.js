function validarRegistro() {

    usuario = document.getElementById("userName").value;
    email = document.getElementById("mail").value;
    password = document.getElementById("passW").value;
    direccion = document.getElementById("direccion").value;
    poblacion = document.getElementById("country").value;
    codigoPostal = document.getElementById("postalCode").value;

    expresion = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$;
    valido = true;


    if (usuario.length === 0 || usuario == null || /^\s+$/.test(usuario)) {
        valido = false;
        alert('Debes introducir un nombre de usuario.');
    }

    if (email.length === 0 || email == null || /^\s+$/.test(email) || expresion.test(email)) {
        valido = false;
        alert('Debes introducir una dirección de correo electrónico válida');
    }


    if (!(/^[\w]+$/.test(password))) {
        valido = false;
        alert('La contraseña solo puede contener números y letras.');
    }

    if (direccion.length === 0 || direccion == null || /^\s+$/.test(direccion)) {
        valido = false;
        alert('Debes introducir una dirección.');
    }

    if (poblacion.length === 0 || poblacion == null || /^\s+$/.test(poblacion)) {
        valido = false;
        alert('Debes introducir una población.');
    }

    if (isNaN(codigoPostal) || codigoPostal.length !== 5) {
        valido = false;
        alert('El código postal debe estar formado por 5 números');
    }
    return valido;
}

