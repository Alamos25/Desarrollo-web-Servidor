<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuemros primos</title>
</head>
<body>
    
<h1>Ejercicio numeros primos</h1>
    <form action="" method="post">
        <label for="num1">Numero1:</label>
        <input type="text" name="num1">
        <br>
        <label for="num2">Numero2:</label>
        <input type="text" name="num2">
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $contador = 0;

            for($i = $num1; $i <= $num2; $i++){
                for($j = 1; $j <= $i; $j++){
                    if($i % $j == 0){
                        $contador++;
                    }
                }
                if($contador == 2){
                    echo "<p>$i</p>";
                }
                $contador = 0;
            }
        }
    ?>


</body>
</html>