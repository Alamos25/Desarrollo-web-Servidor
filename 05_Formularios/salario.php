<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">

    <input type="text" name="Salario" id="Salario" placeholder="Introduce tu Salario">
    <input type="submit" value="Enviar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $Salario = $_POST["Salario"];
        $Salario_final = 0;
        $porce1 += 12450 * 0.19;
        $porce2 += 20199 * 0.24;
        $porce3 += 35.199 * 0.30;
        $porce4 += 59999 * 0.37;
        $porce5 += 299999 * 0.45;

        if($Salario <= 12450){
            $Salario_final += $Salario - ($Salario * 0.19);
        } elseif ($Salario >= 12451 && $Salario <= 20199) {
            $resto1 += ($Salario - 12451) * 0.24;

            $Salario_final += $Salario - ($porce1 + $resto1);
        } elseif ($Salario >= 20200 && $Salario <= 35199){
            $resto1 += ($Salario - 20200) * 0.30;

            $Salario_final += $Salario - ($porce1 + $porce2 + $resto1);
        }
        elseif ($Salario >= 35200 && $Salario <= 59999){
            $resto1 += ($Salario - 35200) * 0.37;

            $Salario_final += $Salario - ($porce1 + $porce2 + $porce3 + $resto1);
        }
        elseif ($Salario >= 60000 && $Salario <= 299.999){
            $resto1 += ($Salario - 60000) * 0.45;

            $Salario_final += $Salario - ($porce1 + $porce2 + $porce3 + $porce4 + $resto1);
        }
        else{
            $resto1 += ($Salario - 300000) * 0.47;

            $Salario_final += $Salario - ($porce1 + $porce2 + $porce3 + $porce4 + $porce5 + $resto1);
        }

        echo "<p>$Salario_final</p>";
    }
    ?>

</body>
</html>