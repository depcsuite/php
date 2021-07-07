window.onload = function () {
    nombre = prompt("Ingresa tu nombre:");
    pregunta = confirm(nombre + " sos mayor de edad?");
    if(!pregunta){
        location = "https://google.com.ar";
    }

    document.getElementById("btnIngresarDatos").onclick = function () {
        do {
            numero1 = prompt("Ingrese un número");
            numero2 = prompt("Ingrese otro número");
            confirmacion = confirm("¿Desea confirmar los números ingresados?");
        } while (!confirmacion);
        document.write("Los números ingresados son: " + numero1 + " y " + numero2);
    };

};
