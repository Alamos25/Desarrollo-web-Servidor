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

    //Ejercicio 2: MOSTRAR EN UNA LISTA LOS MULTIPLOS DE 3 USANDO
    //WHILE E IF ENTRE 1 U 100.
    echo "<h1>EJERCICIO 2</h1>";
        $i = 1;
        echo "<ul>";
        while($i <= 100){
            if ($i % 3 == 0){
                echo "<li>$i</li>";
            }
            $i++;
        }
        echo "</ul>";

    //EJERCICIO 3: CALCULAR LA SUMA DE LOS NUMEROS PARES ENTRE 1 Y 20
    echo "<h1>EJERCICIO 3</h1>"; 
        $i = 1;
        $suma = 0;
        while($i <= 20){
            if($i %2 == 0) {
                $suma += $i;
            }
            $i++;
        }
        echo "<p>Solucion: $suma</p>";
    //EJERCICIO 4: CALCULAR EL FACTORIAL DE 6 CON WHILE
    echo "<h1>EJERCICIO 4</h1>";    
        $i = 1;
        $factorial = 6;
        $resultado = 1;
        while ($i <= $factorial){
            $resultado *= $i;
            $i++;
        }
        echo "<p>$resultado</p>";

    echo "<h1>EJERCICIO 5</h1>";
    //Muestra por pantalla los 50 primeros numeros primos
    
    /**
     * 
     * 4 % 2 = 0    4 NO ES PRIMO
     * 4 % 3 = 1
     * 
     * 5 % 2 = 1    5 SI ES PRIMO
     * 5 % 3 = 2
     * 5 % 4 = 1
     * 
     * BUCLE DE 2 A N-1
     * 
     * $N = 7
     * FOR 2 HASTA $n -1
     *      COMPROBAR SI 7 TIENE DIVISORES QUE DEN RESTO 0
     *          SI EXISTE ENTONCES DEVOLVER FALSO
     *          ELSE DEVOLVER TRUE
     */

    //BUCLE HASTA EL INFINITO Y MAS ALLA
    $numero = 2;
    $numerosPrimos = 0;

    echo "<ol>";
    while($numerosPrimos < 10000) {
        $esPrimo = true;
        for($i = 2; $i < $numero; $i++){
            if($numero % $i == 0){
                //NO ES PRIMO
                $esPrimo = false;
                break;
            }
        }
        if($esPrimo){
            $numerosPrimos++;
            echo "<li>$numero</li>";
        } 
        $numero++;
    }
    echo "</ol>";
    var_dump($esPrimo);

    
    ?>
</body>
</html>