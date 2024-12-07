<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error {
            color: red;
        }
        .cuerpo {
            margin-left: 10px;
        }
    </style>
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        require('../util/conexion.php');

        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada); 
            $salida = trim($salida); 
            $salida = stripslashes($salida); 
            $salida = preg_replace('/\s+/', ' ', $salida); 
            return $salida; 
        }
    ?>
</head>
<body class="cuerpo">
    <h1>Crear nuevo producto</h1>
    <?php
        $nombre = "";
        $precio = "";
        $stock = "";
        $categoria = "";
        $descripcion = "";
        $imagen = "";

        $err_nombre = "";
        $err_precio = "";
        $err_categoria = "";
        $err_descripcion = "";
        $err_imagen = "";

        $sql = "SELECT * FROM categorias";
        $categorias = $_conexion -> query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST['nombre']);
            $tmp_precio = depurar($_POST['precio']);
            $stock = depurar($_POST['stock']);
            if(isset($_POST["categoria"])){
                $tmp_categoria = $_POST["categoria"];
            } else {
                $tmp_categoria = "";
            }
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_imagen = $_FILES["imagen"]["name"];

            if ($tmp_nombre == '') {
                $err_nombre = "Nombre obligatorio";
            } elseif (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 50) {
                $err_nombre = "Debe tener entre 3 y 50 caractere";
            } else {
                $nombre = $tmp_nombre;
            }

            if ($tmp_precio == '') {
                $err_precio = "Precio es obligatorio";
            }else{
                $patron = "/^[0-9]{1,4}(\.[0-9]{1,2})?$/";
                if (!preg_match($patron, $tmp_precio)) {
                    $err_precio = "Hasta 4 dígitos y 2 decimales";
                } else {
                    $precio = $tmp_precio;
                }
            } 

            if ($tmp_categoria == '') {
                $err_categoria = "Categoria obligatoria";
            } else {
                $categoria = $tmp_categoria;
            }

            if($stock == ''){
                $stock = 0;
            }

            if ($tmp_descripcion == '') {
                $err_descripcion = "Descripcion obligatoria";
            } else {
                $descripcion = $tmp_descripcion;
            }

            if ($tmp_imagen == '') {
                $err_imagen = "Debes ingresar una imagen"; 
           } else { 
               $tmp_imagen = $_FILES["imagen"]["name"]; 
               $ubicacion_temporal = $_FILES["imagen"]["tmp_name"]; 
               $ubicacion_final = "./imagen/$tmp_imagen"; 
           }

            if (isset($nombre, $precio, $categoria, $descripcion, $tmp_imagen) && !$err_nombre && !$err_precio && !$err_categoria && !$err_descripcion && !$err_imagen) {
                $sql = "INSERT INTO productos (nombre, precio, stock, categoria, imagen, descripcion) 
                        VALUES ('$nombre', '$precio', '$stock', '$categoria', '$tmp_imagen', '$descripcion')";
                if ($_conexion->query($sql)) {
                    echo "<p>Producto creado con exito.</p>";
                } else {
                    echo "<p>Error producto no creado: " . $_conexion->error . "</p>";
                }
            }
        }
    ?>

    <form class="col-6" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label" for="nombre">Nombre:</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>">
            <?php if ($err_nombre) echo "<span class='error'>$err_nombre</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="precio">Precio:</label>
            <input class="form-control" type="text" name="precio" value="<?php echo htmlspecialchars($precio); ?>" pattern="[0-9]{1,4}(\.[0-9]{1,2})?">
            <?php if ($err_precio) echo "<span class='error'>$err_precio</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="stock">Stock:</label>
            <input class="form-control" type="number" name="stock" value="<?php echo htmlspecialchars($stock); ?>">
        </div>
        <div class="mb-3">
            <label class="form-label" for="categoria">Categoría:</label>
            <select class="form-select" name="categoria">
            <option disabled selected hidden>Seleccione una categoría</option>
            <?php while ($categoria = $categorias->fetch_assoc()): ?>
                <option value="<?php echo htmlspecialchars($categoria['categoria']); ?>" 
                    <?php echo (isset($categoria) && $categoria == $categoria['categoria']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($categoria['categoria']); ?>
                </option>
            <?php endwhile; ?>
            </select>
            <?php if ($err_categoria) echo "<span class='error'>$err_categoria</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="imagen">Imagen:</label>
            <input class="form-control" type="file" name="imagen">
            <?php if ($err_imagen) echo "<span class='error'>$err_imagen</span>"; ?>
        </div>
        <div class="mb-3">
            <label class="form-label" for="descripcion">Descripción:</label>
            <textarea class="form-control" name="descripcion" rows="4"><?php echo htmlspecialchars($descripcion); ?></textarea>
            <?php if ($err_descripcion) echo "<span class='error'>$err_descripcion</span>"; ?>
        </div>
        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Insertar">
            <a class="btn btn-secondary" href="index.php">Volver</a>
        </div>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>