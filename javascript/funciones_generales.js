window.onload = function () {
    var nombre = prompt("Ingrese su nombre");
    alert("Su nombre es: " + nombre);

    var mayor = confirm("¿Sos mayor de edad?");
    if (!mayor) {
        window.location = "https://www.google.com.ar/";
    }

};
