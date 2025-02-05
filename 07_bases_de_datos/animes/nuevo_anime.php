<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );

        require('conexion.php');
    ?>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = $_POST["titulo"];
        $nombre_estudio = $_POST["nombre_estudio"];
        $anno_estreno = $_POST["anno_estreno"];
        $num_temporadas = $_POST["num_temporadas"];

        /**
         * $_FILES -> que es un array BIDIMENSIONAL
         */
         //var_dump($_FILES["imagen"]);
        $nombre_imagen = $_FILES["imagen"]["name"];
        $ubicacion_temporal = $_FILES["imagen"]["tmp_name"];
        $ubicacion_final = "./imagenes/$nombre_imagen";

        move_uploaded_file($ubicacion_temporal, $ubicacion_final);
        
        /*$sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas, imagen)
            VALUES ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas, '$ubicacion_final')";
    
        $_conexion -> query($sql);*/

        /**
         * Las 3 etapas de las prepared statements
         * 
         * 1. Preparación
         * 2. Enlazado (binding)
         * 3. Ejecución
         */

        //1. preparacion
        $sql = $_conexion -> prepare("INSERT INTO animes
        (título, nombre_estudio, anno_estreno, num_temporadas, imagen)
        VALUES (?,?,?,?,?)");

        //2. Enlazado
        $sql -> bind_param("ssiis", 
            $titulo, 
            $nombre_estudio, 
            $anno_estreno, 
            $num_temporadas, 
            $ubicacion_final
        );

        //3. Ejecución
        $sql -> execute();
    }

    $sql = "SELECT * FROM estudios ORDER BY nombre_estudio";
    $resultado = $_conexion -> query($sql);
    //cierre
    $_conexion -> close();
    $estudios = [];

    while($fila = $resultado -> fetch_assoc()) {
        array_push($estudios, $fila["nombre_estudio"]);
    }
    //print_r($estudios);

    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <select class="form-select" name="nombre_estudio">
                    <option value="" selected disabled hidden>--- Elige el estudio ---</option>
                    <?php 
                        foreach($estudios as $estudio) { ?>
                            <option value="<?php echo $estudio ?>">
                                <?php echo $estudio ?>
                    <?php } ?>
                    
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Año estreno</label>
                <input class="form-control" type="text" name="anno_estreno">
            </div>
            <div class="mb-3">
                <label class="form-label">Número de temporadas</label>
                <input class="form-control" type="text" name="num_temporadas">
            </div>
            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input class="form-control" type="file" name="imagen">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" name="Insertar" value="insertar">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
        <?php
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>