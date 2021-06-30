function termineSandwich() {
    console.log("termine mi sandwich");
}

function miSandwich(ingrediente1, ingrediente2, termineSandwich) {
    console.log("Estoy comiendo un sandwich de " + ingrediente1 + " y " + ingrediente2);
    termineSandwich();
} 

miSandwich("jamón", "queso", termineSandwich);
