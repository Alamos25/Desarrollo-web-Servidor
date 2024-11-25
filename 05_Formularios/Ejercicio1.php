<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <label for="Numero1">Numero1</label>
        <input type="text" name="Numero1" id="Numero1" placeholder="Introduce tu nombre">

        <label for="Numero2">Numero2</label>
        <input type="text" name="Numero2" id="Numero2" placeholder="Introduce tu Edad">

        <label for="Numero3">Numero3</label>
        <input type="text" name="Numero3" id="Numero3" placeholder="Introduce tu Edad">


        <input type="submit" value="Enviar">
    </form> 

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $numero1 = $_POST["Numero1"];
        $numero2 = $_POST["Numero2"];
        $numero3 = $_POST["Numero3"];
        
        if($numero1 < $numero2 && $numero3 < $numero2){
            echo "<p>El numero mayor es: $numero2</p>";
        } elseif ($numero2 < $numero1 && $numero3 < $numero1){
            echo "<p>El numero mayor es: $numero1</p>";
        } else {
            echo "<p>El numero mayor es: $numero3</p>";
        }
    }
    ?>

    


    

    





</body>
</html>