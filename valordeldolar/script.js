const url = "https://www.dolarsi.com/api/api.php?type=valoresprincipales";

fetch(url)
    .then(response => response.json())
    .then(data => {
        const dolarBlue = data[1].casa;
        const dolarOficial = data[0].casa;
        const dolarTurista = data[2].casa;

        document.getElementById("dolar-blue-valor").textContent = `$${dolarBlue.venta}`;
        document.getElementById("dolar-oficial-valor").textContent = `$${dolarOficial.venta}`;
        document.getElementById("dolar-turista-valor").textContent = `$${dolarTurista.venta}`;
    })
    .catch(error => console.log(error));
