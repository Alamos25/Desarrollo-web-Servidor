<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $numero = 0;
    if($numero > 0){
        echo "<p>El número $numero es mayor que cero</p>";
    }

    if($numero > 0){
        echo "<p>El número $numero es mayor que cero</p>";
    }elseif ($numero == 0) {
        echo "<p>El número $numero es igual que cero</p>";
    } else {
        echo "<p> El número $numero es menor que cero</p>";
    }


    #rangos [-10,0  ,   0,10    ,    10,20]

    #Forma 1
    $num = -7;
    #and o && para la conjunción
    if($num >= -10 && $num < 0) {
        echo "<p> El numero $num esta en el rango (-10, 0)</p>";
    } elseif($num >= 0 && $num <= 10){
        echo "<p> El numero $num esta en el rango (0, 10)</p>";
    } elseif($num > 10 && $num <= 20) {
        echo "<p> El numero $num esta en el rango (10, 20)</p>";
    } else {
        echo "<p> El numero $num esta fuera del rango</p>";
    }

    #Forma 2
    $num = -7;
    #and o && para la conjunción
    if($num >= -10 && $num < 0) echo "<p> El numero $num esta en el rango (-10, 0)</p>";
    elseif($num >= 0 && $num <= 10) echo "<p> El numero $num esta en el rango (0, 10)</p>";
    elseif($num > 10 && $num <= 20)  echo "<p> El numero $num esta en el rango (10, 20)</p>";
    else echo "<p> El numero $num esta fuera del rango</p>";
    

    #Forma3
    $num = -7;
    #and o && para la conjunción
    if($num >= -10 && $num < 0):
        echo "<p> El numero $num esta en el rango (-10, 0)</p>";
    elseif($num >= 0 && $num <= 10):
        echo "<p> El numero $num esta en el rango (0, 10)</p>";
    elseif($num > 10 && $num <= 20):
        echo "<p> El numero $num esta en el rango (10, 20)</p>";
    else:
        echo "<p> El numero $num esta fuera del rango</p>";
    endif;

    /*
    Comprobar de tres formas diferentes, con la estructura IF,
     si el numero aleatorio tiene 1, 2 o 3 digitos.
    */

    $numero_aleatorio = rand(1,200);
    $numero_aleatorio_decimal = rand(10,100)/10;

    if($numero_aleatorio >= 1 && $numero_aleatorio <=9) {
        echo "<p> El numero $numero_aleatorio Tiene un digito</p>";
    } elseif($numero_aleatorio >= 10 && $numero_aleatorio <= 99){
        echo "<p> El numero $numero_aleatorio tiene dos digitos</p>";
    } else {
        echo "<p> El numero $numero_aleatorio tiene tres digitos</p>";
    }

    if($numero_aleatorio >= 1 && $numero_aleatorio <=9) echo "<p> El numero $numero_aleatorio Tiene un digito</p>";
    elseif($numero_aleatorio >= 10 && $numero_aleatorio <= 99) echo "<p> El numero $numero_aleatorio tiene dos digitos</p>";
    else echo "<p> El numero $numero_aleatorio tiene tres digitos</p>";
    
    if($numero_aleatorio >= 1 && $numero_aleatorio <=9):
        echo "<p> El numero $numero_aleatorio Tiene un digito</p>";
    elseif($numero_aleatorio >= 10 && $numero_aleatorio <= 99):
        echo "<p> El numero $numero_aleatorio tiene dos digitos</p>";
    else:
        echo "<p> El numero $numero_aleatorio tiene tres digitos</p>";
    endif;

    //VERSION MATCH
    $digitos = match(true) {
        $numero_aleatorio >= 1 && $numero_aleatorio <= 9 => 1,
        $numero_aleatorio >= 10 && $numero_aleatorio <= 99 => 2,
        $numero_aleatorio >= 100 && $numero_aleatorio <= 999 => 3,
        default => "ERROR"
    };
    echo "<h1>El numero tiene $digitos digitos</h1>";



/* ------------- SWITCH -------------- */
    $n = rand(1,3);

    switch ($n) {
        case 1:
            echo "El numero es 1";
            break;
        case 2:
            echo "El numero es 2";
            break;
        default:
            echo "El numero es 3";
            break;
    }

    $resultado = match ($n) {
        1 => "El numero es 1",
        2 => "El numero es 2",
        3 => "El numero es 3"
    };
    echo "<h3>$resultado</h3>";



    ?>
</body>
</html>