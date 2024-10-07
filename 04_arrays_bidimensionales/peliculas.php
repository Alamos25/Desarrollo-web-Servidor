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
    $_nombre = array_column($pelicula, 0);
    $_tema = array_column($pelicula, 1);
    $_año = array_column($pelicula, 2);
    $_duracion = array_column($pelicula, 3);
    $_tipo_de_pelicula = array_column($pelicula, 4);
    array_multisort($_tipo_de_pelicula, SORT_ASC, $_año,  SORT_ASC, $_nombre,  SORT_ASC, $pelicula);
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