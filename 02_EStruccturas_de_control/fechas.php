<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $numero = "2";
    $numero = (int) $numero;

    if($numero == 2){
        echo "EXISTO";
    } else {
        echo "NO EXITO";
    }

    /*
    "2" == 2    es igual a 2
    "2" != 2    "2" no es idéntico a 2
    2 == 2      2 sí es identico a 2
    2 != 2.0    2 no es identico a 2.0
    */
    
    $hora = (int)date("G");
    //var_dump($hora)
    
    /*
    Si $hora entre las 6 y 11, es mañana
    Si $hora entre 12 y 14, es mediodia
    Si $hora entre 15 y 20, es tarde
    si $hora entre 20 y 24, es noche
    Si $hora entre 1 y 5, es madrugada) */
    if($hora >= 1 && $hora <=5) {
        echo "<p> Es madrugada</p>";
    } elseif($hora >= 6 && $hora <=11){
        echo "<p> Es mañana</p>";
    }elseif($hora >= 12 && $hora <=14){
        echo "<p> Es mediodia</p>";
    }elseif($hora >= 15 && $hora <=20){
        echo "<p> Es tarde</p>";
    } else {
        echo "<p> Es noche</p>";
    }
    

    $hora_exacta = date("H:i:s");
    echo "<h1>$hora_exacta</h1>";

    $dia = date("l");
    echo "<h2>Hoy es $dia </h2>";

    /*
        TENEMOS CLASE LUNES, MIERCOLES Y VIERNES
        NO TENEMOS CLASE EL RESTO
        
        HACER UN SWITCH QUE DIGA SI HOY TENEMOS CLASE
    */

    switch ($dia) {
        case "Monday":
        case "Wednesday":
        case "Friday":
            echo "Hoy $dia tenemos clase";
            break;
        default:
            echo "No $dia tenemos clase";
            break;
    }

    /*CON UNA ESTRUCTURA SWITCH CAMBIAR LA VARIABLE DIA A ESPAÑOL */

    $dia = date("l");
    $dia_español = null;

    switch($dia){
        case "Monday":
            $dia_español = ("Lunes");
            echo "Hoy $dia_español tenemos clase";
            break;
        case "Wednesday":
            $dia_español = ("Miercoles");
            echo "Hoy $dia_español tenemos clase";
            break;
        case "Friday":
            $dia_español = ("Viernes");
            echo "Hoy $dia_español tenemos clase";
            break;
    }

    $dia = date("l");
    $dia_español = null;

    $dia_español = match ($dia) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "wednesday" => "Miercoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sabado",
        "Sunday" => "Domingo"
    };
    echo "<h3>$dia_español</h3>";

    ?>
    </body>
</html>