<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<body>
    <div class="container">
    <h1>Editar Producto</h1>
        <?php
        $id_producto = $_GET["id_producto"];
        $sql = "SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = $_conexion -> query($sql);
        
        while($fila = $resultado -> fetch_assoc()){
            $nombre = $fila["nombre"];
            $precio = $fila["precio"];
            $categoria = $fila["categoria"];
            $stock = $fila["stock"];
            $descripcion = $fila["descripcion"];
        }
        
        $sql_categorias = "SELECT * FROM categorias";
        $resultado_categorias = $_conexion -> query($sql_categorias);
        ?>

        <?php
        $err_nombre = $err_precio = $err_categoria = $err_descripcion = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_nombre = depurar($_POST["nombre"]);
            $tmp_precio = depurar($_POST["precio"]);
            $tmp_categoria = depurar($_POST["categoria"]);
            $stock = depurar($_POST["stock"]);
            $tmp_descripcion = depurar($_POST["descripcion"]);

            if ($tmp_nombre == '') {
                $err_nombre = "Nombre obligatorio";
            } elseif (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 50) {
                $err_nombre = "El nombre debe tener entre 3 y 50 caractere";
            } else {
                $nombre = $tmp_nombre;
            }

            if ($tmp_precio == '') {
                $err_precio = "Precio obligatorio";
            } elseif (!preg_match("/^[0-9]{1,4}(\.[0-9]{1,2})?$/", $tmp_precio)) {
                $err_precio = "Maximo 4 dígitos y 2 decimales";
            } else {
                $precio = $tmp_precio;
            }

            if ($tmp_categoria == '') {
                $err_categoria = "Selecciona una categoria";
            } else {
                $categoria = $tmp_categoria;
            }

            if ($tmp_descripcion == '') {
                $err_descripcion = "Descripcion obligatoria";
            } else {
                if(strlen($tmp_descripcion) > 255){
                    $err_descripcion = "tmp_descripcion";
                }
                $descripcion = $tmp_descripcion;
            }
            
            if (isset($nombre, $precio, $categoria, $stock, $descripcion)) {
                $sql_update = "UPDATE productos SET 
                    nombre = '$nombre', 
                    precio = '$precio', 
                    categoria = '$categoria', 
                    stock = '$stock', 
                    descripcion = '$descripcion'
                    WHERE id_producto = '$id_producto'";
                $_conexion -> query($sql_update);
                echo"<p>Producto actualizado correctamente.</p>";
            }
        }
        ?>
        
        <form class="col-6" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input class="form-control" type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" >
                <?php if ($err_nombre) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input class="form-control" type="text" name="precio" value="<?php echo htmlspecialchars($precio); ?>" >
                <?php if ($err_precio) echo "<span class='error'>$err_precio</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label" for="categoria">Categoría:</label>
                <select class="form-select" name="categoria" required>
                    <option disabled selected hidden>Seleccione una categoría</option>
                    <?php while ($categoria_db = $resultado_categorias -> fetch_assoc()): ?>
                        <option value="<?php echo $categoria_db['categoria']; ?>" 
                        <?php echo ($categoria == $categoria_db['categoria']) ? 'selected' : ''; ?>>
                        <?php echo $categoria_db['categoria']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <?php if ($err_categoria) echo "<span class='error'>$err_categoria</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Stock</label>
                <input class="form-control" type="text" name="stock" value="<?php echo $stock; ?>" >
            </div>
            <div class="mb-3">
                <label class="form-label" for="descripcion">Descripción:</label>
                <textarea class="form-control" name="descripcion" rows="4" cols="50" ><?php echo $descripcion; ?></textarea>
                <?php if ($err_descripcion) echo "<span class='error'>$err_descripcion</span>"; ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
                <input class="btn btn-primary" type="submit" value="Actualizar Producto">
                <a class="btn btn-secondary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<!--  script para la base de datos 


  CREATE DATABASE tienda_bd;

USE tienda_bd;

CREATE TABLE categorias (
    categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255) NOT NULL
);

CREATE TABLE productos (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    precio NUMERIC(6,2) NOT NULL,
    categoria VARCHAR(30),
    stock INT DEFAULT 0,
    imagen VARCHAR(60) NOT NULL,
    descripcion VARCHAR(255),
    FOREIGN KEY (categoria) REFERENCES categorias(categoria)
);
-->