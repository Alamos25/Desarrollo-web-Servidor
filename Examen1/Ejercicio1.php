<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href = "estilos.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
</head>
<body>
    <?php
        $array = [0,1,2,3,4];
        $animes = [
            ["Goku", "Accion"],
            ["Doraimon", "Fantasia"]
        ];
        
        //Borro el primer anime
        unset($animes[0]);
        $animes = array_values($animes);
        for($i = 0; $i < count($animes); $i++){
            $animes[$i][2] = rand(1990 ,2030);
        }
        for($i = 0; $i < count($animes); $i++){
            $animes[$i][3] = rand(1 ,99);
        }

        for($i = 0; $i < count($animes); $i++){
            if ($animes[$i][2] <= 2024){
                $animes[$i][4] = "Ya disponible";
            } else{
                $animes[$i][4] = "Proximamente";
            }
            $animes[$i][3] = rand(1 ,99);
        }

        $_Genero = array_column($animes, 0);
        $_añoestreno = array_column($animes, 1);
        $_Titulo = array_column($animes, 2);

        //array_multisort($_Genero, SORT_ASC, $$_añoestreno, SORT_ASC, $_Titulo, SORT_ASC, $animes);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Genero</th>
                <th>Año Estreno</th>
                <th>Episodios</th>
                <th>Estrenos</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($animes as $anime){
                list($Titulo, $Genero, $añoestreno, $Episodios, $Estrenos ) = $anime;
                echo "<tr>";
                echo "<td>$Titulo</td>";
                echo "<td>$Genero</td>";
                echo "<td>$añoestreno</td>";
                echo "<td>$Episodios</td>";
                echo "<td>$Estrenos</td>";
                echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>