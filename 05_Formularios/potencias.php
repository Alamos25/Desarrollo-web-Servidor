<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencias</title>
</head>
<body>
        <form action="" method="post">
            <label for="base">Base</label>
            <input type="text" name="base" id="base" placeholder="Introduzca la base">

            <input type="text" name="base">
            <input type="text" name="exponente">
            <input type="submit" value="Enviar">

        </form>  
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $base = $_POST["base"];
            $exponente = $_POST["exponente"];
            $total = 1;

            for($i = 0; $i < $exponente; $i++){
                $total *= $base;
            }
            echo "<p>total es: $total</p>";
        }


        /* CREA UN FORMULARIO QUE RECIBA DOS PARAMETROS:
        BASE Y EXPONENTE
        
        CUANDO SE ENVIE EL FORMULARIO, SE CALCULARA EL RESULTADO
        DE ELEBAR LA BASE AL EXPONENTE
        
        EJEMPLOS:
        
        2 ELEVADO A 3 = 8 => 2*2*2 = 8
        3 ELEVADO A 2 = 9 => 3*3 = 9
        3 ELEVADO A 1 = 2
        3 ELEVADO A 0 = 1 */
    ?>
</body>
</html>