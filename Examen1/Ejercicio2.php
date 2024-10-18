<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href = "estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $array1 = [];
    $array2 = [];

    for ($i = 0; $i <= 4; $i++) {
        $array1[$i] = rand(1,5);
        //echo "<li>" . $array1[$i] .  "</li>";
    }
    for ($i = 0; $i <= 4; $i++) {
        $array2[$i] = rand(10,100);
        //echo "<li>" . $array2[$i] .  "</li>";
    }

    echo "<p>";
    foreach($array1 as $arrays1) {
        echo"$arrays1";
        echo ",";
    }
    echo "</p>";

    echo "<p>";
    foreach($array2 as $arrays2) {
        echo"$arrays2";
        echo ",";
    }
    echo "</p>";

    $maximo1 = 0;
    $minimo1 = 10;
    $total1 = 0;
    for ($i = 0; $i < count($array1); $i++){
        $total1 += $array1[$i];
        if($maximo1 < $array1[$i]){
            $maximo1 = $array1[$i];
        } elseif ($minimo1 > $array1[$i]){
            $minimo1 = $array1[$i];
        }
    }
    $total1 = $total1 / count($array1);

    $maximo2 = 0;
    $minimo2 = 10;
    $total2 = 0;
    for ($i = 0; $i < count($array2); $i++){
        $total2 += $array2[$i];
        if($maximo2 < $array2[$i]){
            $maximo2 = $array2[$i];
        } elseif ($minimo2 > $array2[$i]){
            $minimo2 = $array2[$i];
        }
    }
    $total2 = $total2 / count($array2);

    echo "<h3>Array1 resultados</h3>";
    echo "<p>$maximo1</p>";
    echo "<p>$minimo1</p>";
    echo "<p>$total1</p>";

    echo "<h3>Array2 resultados</h3>";
    echo "<p>$maximo2</p>";
    echo "<p>$minimo2</p>";
    echo "<p>$total2</p>";
    ?>
</body>
</html>