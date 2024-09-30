<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplos</title>
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
    ?>
</body>
</html>