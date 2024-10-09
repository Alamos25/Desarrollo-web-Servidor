<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Formularios</title>
</head>
<body>
    <form action="" method="post">
        <!--<input type="text" name="mensaje">-->
        <!-- aqui va otro numero-->
         <input type="number" name="numeros">
         <input type="text" name="texto">
        <input type="submit" value="Enviar">

    </form>    

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        /**ESTE CODIGO SE EJECUTA CUANDO EL SERVIDOR RECIBE UNA 
         * PETIFICION POST
         */

        // añadir al formulario un campo de texto adicional para introducir un numero.
        // mostrar el mensaje tantas veces como indique el numero.
    
        $mensaje = $_POST["mensaje"];
        echo "formulario enviado";
        $texto = $_POST["texto"];
        $numeros = $_POST["numeros"];
        for($i = 0; $i < $numeros; $i++){
            echo "<p>$texto</p>";
        }

        // añadir al formulario un campo de texto adicional para introducir un numero.
        // mostrar el mensaje tantas veces como indique el numero.
    }

    ?>

</body>
</html>