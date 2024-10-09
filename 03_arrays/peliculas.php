<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peliculas</title>
    <link rel="stylesheet" href = "estilos.css">
</head>
<body>
    <?php
    $peliculas = [
        ["Kárate a muerte en Torremolines", "Acción", 1975],
        ["Sharknado 1-5", "Accion", 2015],
        ["Princesa por sorpresa 2", "Comedia", 2008],
        ["Carió, he encogido a los niños", "Aventuras", 2001],
        ["Stuart Little", "Infantil", 2000]
    ];

    for($i = 0; $i < count($peliculas); $i++){
        $peliculas[$i][3] = rand(30,240);
    }

    for($i = 0; $i < count($peliculas); $i++){
        if ($peliculas[$i][3] < 60){
            $peliculas[$i][4] = "Cortometraje";
        } else{
            $peliculas[$i][4] = "Largometraje";
        }
    }
    ?>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Tema</td>
                <td>Año</td>
                <td>Duracion</td>
                <td>Tipo de pelicula</td>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($peliculas as $pelicula){
                //print_r($videojuego);
                //echo $videojuego[0];
                //echo "<br><br>";
                list($Nombre, $Tema, $Año, $Duracion, $Tipo_de_pelicula) = $pelicula;
                echo "<tr>";
                echo "<td>$Nombre</td>";
                echo "<td>$Tema</td>";
                echo "<td>$Año</td>";
                echo "<td>$Duracion</td>";
                echo "<td>$Tipo_de_pelicula</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>

    <?php
    $_nombre = array_column($peliculas, 0);
    $_tema = array_column($peliculas, 1);
    $_año = array_column($peliculas, 2);
    $_duracion = array_column($peliculas, 3);
    $_tipo_de_pelicula = array_column($peliculas, 4);
    array_multisort($_tipo_de_pelicula, SORT_ASC, $_año,  SORT_DESC, $_nombre,  SORT_ASC, $peliculas);
    ?>

    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Tema</td>
                <td>Año</td>
                <td>Duracion</td>
                <td>Tipo de pelicula</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($peliculas as $pelicula){
                //print_r($videojuego);
                //echo $videojuego[0];
                //echo "<br><br>";
                list($_nombre, $_tema, $_año, $_duracion, $_tipo_de_pelicula) = $pelicula;
                echo "<tr>";
                echo "<td>$_nombre</td>";
                echo "<td>$_tema</td>";
                echo "<td>$_año</td>";
                echo "<td>$_duracion</td>";
                echo "<td>$_tipo_de_pelicula</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>