<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimensionales</title>
    <link rel="stylesheet" href = "estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
    $array = [1,2,3,4];

    $videojuegos = [
        ["Disco Elysium", "RPG", 9.99],
        ["Dragon Ball Z Kakarot", "Acción", 59.99],
        ["Persona 3", "RPG", 24.99],
        ["Commando 2", "Estrategia", 4.99],
        ["Hollow Knight", "Metroidvania", 9.99],
        ["Stardew Valley", "Gestión de recursos", 7.99]
    ];

    $nuevo_videojuego = ["Octopath Traveler", "RPG", 29.95];
    array_push($videojuegos, $nuevo_videojuego);

    array_push($videojuegos, ["Ender Lilies", "Metroidvania", 9.95]);
    
    array_push($videojuegos, ["Fall Guys", "Plataformas", 0]);
    array_push($videojuegos, ["Rocket League", "Deporte", 0]);
    array_push($videojuegos, ["Lego Fortnite", "Acción", 0]);

    for($i = 0; $i < count($videojuegos); $i++){
        if ($videojuegos[$i][2] <= 0){
            $videojuegos[$i][3] = "Gratis";
        } else{
            $videojuegos[$i][3] = "De pago";
        }
    }

    //unset($videojuegos[3]);
    //$videojuegos = array_values($videojuegos);
    //print_r($videojuegos);

    $_titulo = array_column($videojuegos, 0);
    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);

    //Si fuera descendente, SORT_DESC
    array_multisort($_titulo, SORT_ASC, $videojuegos);

    $_categoria = array_column($videojuegos, 1);
    $_precio = array_column($videojuegos, 2);
    array_multisort($_categoria, SORT_ASC, $_precio, SORT_DESC, $_titulo, SORT_DESC, $videojuegos);

    ?>

    <table>
        <thead>
            <tr>
                <th>Videojuego</th>
                <th>Categoria</th>
                <th>Precio</th>
                <th>gratis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($videojuegos as $videojuego){
                //print_r($videojuego);
                //echo $videojuego[0];
                //echo "<br><br>";
                list($titulo, $categoria, $precio, $gratis ) = $videojuego;
                echo "<tr>";
                echo "<td>$titulo</td>";
                echo "<td>$categoria</td>";
                echo "<td>$precio</td>";
                echo "<td>$gratis</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    

</body>
</html>