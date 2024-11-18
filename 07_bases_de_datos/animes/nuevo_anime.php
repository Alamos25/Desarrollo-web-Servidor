<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo anime</title>
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
    ?>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = $_POST["titulo"];
        $nombre_estudio = $_POST["nombre_estudio"];
        $anno_estreno = $_POST["anno_estreno"];
        $nun_temporadas = $_POST["nun_temporadas"];

        $sql = "INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas)
            VALUES ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas";
    
        $_conexion -> query($sql);
    }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <form action="" method="post">
        <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo">
            </div>
            <div class="mb-3">
                <label class="form-label">Nombre estudio</label>
                <input class="form-control" type="text" name="nombre_estudio">
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
                <input class="btn btn-primary" type="submit" name="Insertar" value="insertar">
            </div>
        </form>
        <?php
        
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>