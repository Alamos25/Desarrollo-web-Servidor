<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
    <link rel="stylesheet" href = "estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );
    ?>
</head>
<body>
    <?php
    /**
     * Todos los arrays en php son asociativos, como los map de java
     * 
     * TIENEN PARES CLAVE-VALOR
     */

     $numeros = [5,10,9,6,7,4];
     print_r($numeros); #PRINT RELATIONAL.
     $numeros = array (6,10,9,4,3);

     echo "<br><br>";
     $animales = ["Perro", "Gato", "Suricato", "Capibara"];
     print_r($animales);

     echo "<br><br>";

     $animales = [
        "A01" => "Perro",
        "A02" => "Gato",
        "A03" => "Ormitorrinco",
        "A04" => "Suricato",
        "A05" => "Capibara"
     ];
     print_r($animales);

     echo "<p>" . $animales["A03"] . "</p>";


     $animales[2] = "Koala";
     $animales[6] = "Iguana";
     $animales["A01"] = "Elefante";
     array_push($animales, "Morsa", "Foca"); //Añade huecos al array.
     $animales[] = "Ganso"; //como el array_push
     unset($animales[1]); //Borra el valor de esa posición.

     $animales = array_values($animales); //Ordena el array

     echo "<p>" . "LISTA DE ANIMALES CON FOR". "</p>";

     for ($i = 0; $i < count($animales); $i++) {
        echo "<li>" . $animales[$i] . "</li>";
     }

     echo "<p>" . "LISTA DE ANIMALES CON WHILE". "</p>";

     $i = 0;
     while ($i < count($animales)){
        echo "<li>" . $animales[$i] . "</li>";
        $i++;
     }

     $cantidad_animales = count($animales); //cuenta los elemtos del array

     echo "<h3>Hay   $cantidad_animales animales</h3>";
     // print_r($animales);
    
    //NUEVO ARRAY

    /**
     * "4312 TDZ" => "Audi TT"
     * "1122 FFF" => "Mercedes CLA"
     *  CREAR EL ARRAY CON 3 COCHES
     * 
     * AÑADIR 2 COCHES CON SUS MATRICULAS
     * 
     * BORRAR EL COCHE SIN MATRICULA
     * 
     * RESETEAR LAS CLAVES Y ALMACENAR EL RESULTADO EN OTRO ARRAY
     */

     $vehiculos = [
        "" => "Toyota GT86",
        "5064 CLN" => "Mercedes G63 AMG",
        "2971 FHT" => "Pagani Zonda"
     ];
     unset($vehiculos[""]);

     $mongolo = array_values($vehiculos);

     print_r($mongolo);

     //otra forma
     $vehiculos = [
        "5064 CLN" => "Mercedes G63 AMG",
        "2971 FHT" => "Pagani Zonda"
     ];
     array_push($vehiculos, "Toyota GT86");
     unset($vehiculos[""]);

     $mongolo = array_values($vehiculos);

     //print_r($mongolo);
    
     echo "<p>" . "LISTA DE AVEHICULOS CON FOREACH". "</p>";
    echo "<ol>";
    foreach($vehiculos as $vehiculo) {
        echo "<li>$vehiculo</li>";
    }
    echo "</ol>";

    foreach($vehiculos as $matricula => $vehiculo) {
        echo "<li>$matricula, $vehiculo</li>";
    }
    echo "</ol>";


    $matricula = ["8888 GTT", "8888 GTT", "8888 GTT"];
    ?>

    <table>
        <caption>Coches</caption>
        <thead>
            <tr>
                <th>Matricula</th>
                <th>Coche</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach($vehiculos as $matriculas => $vehiculo) {
                    echo "<tr>";
                    echo "<td>$matriculas</td>";
                    echo "<td>$vehiculo</td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>


    <!-- EJERCICIO 1
            DESARROLLO WEB EN ENTORNO SERVIDOR => ALEJANDRA
            DESARROLLO WEB EN ENTORNO CLIENTE => JOSE MIGUEL
            DISEÑO DE INTERFACES WEB => JOSE MIGUEL
            DESPLIEGUE DE APLICACIONES => JAIME
            EMPRESA E INICIATIVA EMPRENDEDORA => ANDREA
            INGLES => VIRGINIA
            
            MOSTRARLO TODO EN UNA TABLA-->
    <?php
    $asignaturas = [
        "DESARROLLO WEB EN ENTORNO SERVIDOR" => "ALEJANDRA",
        "DESARROLLO WEB EN ENTORNO CLIENTE" => "JOSE MIGUEL",
        "DISEÑO DE INTERFACES WEB" => "JOSE MIGUEL",
        "DESPLIEGUE DE APLICACIONES" => "JAIME",
        "EMPRESA E INICIATIVA EMPRENDEDORA" => "ANDREA",
        "INGLES" => "VIRGINIA"
    ];
    ?>
    <!-- sort, rsotr, arsort, ksort, krsort -->
    <table>
        <caption>Insti</caption>
        <thead>
            <tr>
                <th>Asignatura</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                ksort($asignaturas);
                foreach($asignaturas as $asignatura => $profesor) {
                    echo "<tr>";
                    echo "<td>$asignatura</td>";
                    echo "<td>$profesor</td>";
                    echo "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>
    
    <!-- EJERCICIO 2
            FRANCIASCO => 3
            DANIEL => 5
            AURORA => 10
            LUIS => 7
            SAMUEL => 9
            
            MOSTRAR EN UNA TABLA CON 3 COLUMNAS
            -COLUMNA 1: ALUMNO
            -COLUMNA 2: NOTA
            -COLUMNA 3: SI NOTA < 5, SUSPENSO, ELSE, APROBADO-->
    <?php
    $alumnos = [
        "FRANCISCO" => "3",
        "DANIEL" => "5",
        "AURORA" => "10",
        "LUIS" => "7",
        "SAMUEL" => "9"
    ];
    ?>
    <table>
        <caption>Notas insti</caption>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Apro/Suspe
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                foreach($alumnos as $alumno => $nota) {
                    echo "<tr>";
                    echo "<td>$alumno</td>";
                    echo "<td>$nota</td>";
                    if($nota < 5){
                        echo "<td> Suspenso </td>";
                    } else {
                        echo "<td> Aprobado </td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tr>
        </tbody>
    </table>

    <?php
    $alumnos["paula"] = rand(0,10);
    $alumnos["Waluis"] = rand(0,10);

    unset($alumnos["Samuel"]);

    ksort($alumnos);
    ?>

    <table>
        <caption>Estudiantes ordenador por el nombre al revés</caption>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Nota</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            arsort($alumnos);
            foreach($alumnos as $alumno => $nota) {
                echo "<tr>";
                echo "<td>$alumno</td>";
                echo "<td>$nota</td>";
                if($nota < 5){
                    echo "<td> Suspenso </td>";
                } else {
                    echo "<td> Aprobado </td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    
    



</body>
</html>