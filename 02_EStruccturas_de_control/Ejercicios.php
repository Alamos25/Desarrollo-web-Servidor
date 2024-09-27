<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
</head>
<body>
    <?php 

    // EJERCICIOS 1: CALCULA LA SUMA DE TODOS LOS NUMEROS PARES DEL 1 AL 20-->
    


    //EJERCICIO 2: MOSTRAR LA FECHA ACTUAL CON EL SIGUIENTE FORMATO:
    //    Viernes 27 de septiembre de 2024
    // UTILIZAR LAS ESTRUCTURAS DE CONTROL NECESARIAS
    
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
    
    $mes = date("F");
    $mes_español = null;
    $mes_español = match ($mes) {
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre"
    };

    $dia_num = date("j");
    $año_num = date("Y");
    echo "<h1>$dia_español $dia_num de $mes_español de $año_num</h1>";


    ?>
</body>
</html>