<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio</title>
</head>
<script>
 
    aNumeros = new Array(10, 14, 21, 42, 7, 35, 42, 100);

    function imprimirListado(array){
        array.forEach(function(numero){
            document.write(numero + "<br>");
        })
    }

    document.write("Con foreach, los múltiplos de 7 son :<br>");
    aNumeros.forEach(function (value, index) {
        if(value % 7 == 0){
            document.write(value + "<br>");
        }
    });

    document.write("Listado total de números:<br>");
    imprimirListado(aNumeros);

    document.write("Con filter, los múltiplos de 7 son:<br>");
    aMultiplos = aNumeros.filter(function (value) {
        return (value % 7 == 0);
    });
    imprimirListado(aMultiplos);


    document.write("Función map:<br>");
    aRaiz = aNumeros.map(function (value) {
        return Math.sqrt(value);
    });
    imprimirListado(aRaiz);

   
</script>

<body></body>

</body>

</html>