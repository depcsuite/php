
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="lstTipoProducto" id="lstTipoProducto">
        <option value="" disabled selected>Seleccionar</option>
        <?php foreach($aTipoProductos as $tipo): ?>
            <?php if($producto->fk_idtipoproducto == $tipo->idtipoproducto): ?>
                <option value="<?php echo $tipo->idtipoproducto; ?>" selected><?php echo $tipo->nombre; ?></option>
            <?php else: ?>
                <option value="<?php echo $tipo->idtipoproducto; ?>" ><?php echo $tipo->nombre; ?></option>
           <?php endif; ?>
        <?php endforeach; ?>
    </select>
</body>
</html>