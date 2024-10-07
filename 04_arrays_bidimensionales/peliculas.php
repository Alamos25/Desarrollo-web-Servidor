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
    ?>

    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Tema</td>
                <td>Año</td>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach ($peliculas as $pelicula){
                //print_r($videojuego);
                //echo $videojuego[0];
                //echo "<br><br>";
                list($Nombre, $Tema, $Año) = $pelicula;
                echo "<tr>";
                echo "<td>$Nombre</td>";
                echo "<td>$Tema</td>";
                echo "<td>$Año</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>



</body>
</html>