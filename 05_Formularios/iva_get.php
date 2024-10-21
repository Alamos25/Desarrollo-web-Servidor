<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="get">
        <label for="precio">Precio</label>
        <input type="text" name="precio" id="precio">
        <br><br>
        <select name="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    // isset (is set) devuelve true si la variable existe
    if(isset($_GET["precio"]) and isset($_GET["iva"])) {
        $precio = $_GET["precio"];
        $iva = $_GET["iva"];

        if($precio != '' and $iva != '') {
            $pvp = match($iva) {
                "general" => $precio * 1.21,
                "reducido" => $precio * 1.10,
                "superreducido" => $precio * 1.04
            };
            echo "<p>El PVP ES $pvp</p>";
        } else {
            echo "<p>Te faltan datos</p>";
        }

    }


    //CREAR UNA COPIA DE IRPF.PHP CON GET EN VEZ DE POST Y 
    //CONTROLAR LOS ERRORES DE ENVIAR EL FORMULARIO VACIO

    //https://github.com/Alesa95/desarrollo-web-servidor-2024/blob/main/04_formularios/irpf.php
    ?>
</body>
</html>