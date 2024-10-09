<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
  <!-- 
  Crear un formulario que reciba el nombre y la edad de una
  persona. 
 -Si la edad es menor que 18, se mostrara el nombre.
 -Si la edad esta entre 18 y 65, se mostrara el nombre y
 -que es mayor de edad.
 -Si la edad es mas de 65, se mostrara el nombre y que se ha 
  jubilado.-->

    <form action="" method="post">
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" id="Nombre" placeholder="Introduce tu nombre">

        <label for="Edad">Edad</label>
        <input type="text" name="Edad" id="Edad" placeholder="Introduce tu Edad">

        <input type="submit" value="Enviar">

    </form>  
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = $_POST["Nombre"];
        $edad = $_POST["Edad"];

        if($edad < 18){
            echo "<p>El nombre es: $nombre</p>";
        } elseif ($edad >= 18 && $edad <= 65){
            echo "<p>El nombre es: $nombre y tiene: $edad</p>";
        } elseif ($edad > 65){
            echo "<p>El nombre es: $nombre y esta jubilado</p>";
        } else{
            echo "<p>Edad no valida</p>";
        }
    }
    ?>


  <!-- Crear un formulario que reciba un numero
   Se mostrar la tabla de multiplicar de ese numero
    en una tabla html
   
   2 x 1 = 2
   2x 2 = 4
   -->

   <form action="" method="post">
        <label for="Numero">Numero</label>
        <input type="text" name="Numero" id="Numero" placeholder="Introduce un numero">

        <input type="submit" value="Enviar">

    </form>  
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $numero = $_POST["Numero"];
        $maximo = 0;
        $total = 0;

        for($i = 0; $i < $maximo; $i++){
            $total += ($numero * $i);
            echo "<p>$numero x $i = $total</p>";
        }
    }
    ?>
</body>
</html>