<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require('../util/conexion.php');
    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("location: ../usuario/iniciar_sesion.php");
        exit();
    }

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
    <div class="d-flex justify-content-center"> 
        <?php if (isset($_SESSION["usuario"])) {
            echo "<h2>Bienvenid@ ". $_SESSION["usuario"] . "</h2>"; 
            } else { 
                echo "<h2>Bienvenid@ invitado</h2>"; 
            } ?> 
    </div>

    <?php
    
    // Si el formulario es enviado por POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el id_producto desde el formulario
        $id_producto = $_POST["id_producto"];
        //echo "<h1>Borrando producto con ID: $id_producto</h1>";

        // Borrar producto usando el id correcto
        //$sql = "DELETE FROM productos WHERE id_producto = $id_producto";
            # 1.Prepare
            $sql = $_conexion -> prepare("UPDATE categorias SET
                descripcion = ?,
                WHERE categoria = ?
                ");
        
                # 2.Binding
                $sql -> bind_param("ss",
                $descripcion,
                $categoria
                );
        
                //3. Ejecución
                $sql -> execute();
                $_conexion -> close();
                
        if ($_conexion->query($sql)) {
            echo "<p class='text-success'>Producto eliminado correctamente.</p>";
        } else {
            echo "<p class='text-danger'>Error al eliminar el producto: " . $_conexion->error . "</p>";
        }
    }

    // Obtener todos los productos
    $sql = "SELECT * FROM productos";
    $resultado = $_conexion->query($sql); // Asegúrate de usar la variable correcta
    ?>

    <ul class="nav justify-content-end">
        <li>
             <a class="btn btn-warning" href="../usuario/cerrar_sesion.php">Cerrar sesión</a>
        </li>
    </ul>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th></th> 
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($fila = $resultado -> fetch_assoc()) {
                echo "<tr>";
                echo "<td>". $fila["nombre"] ."</td>";
                echo "<td>". $fila["precio"] ."</td>";
                echo "<td>". $fila["categoria"] ."</td>";
                echo "<td>". $fila["stock"] ."</td>";
                ?>
                <td>
                    <img width='100' height='150' src="imagen/<?php echo $fila["imagen"]; ?>" >
                </td>
                <?php
                echo "<td>". $fila["descripcion"] ."</td>";
                ?>
                <td>
                    <a class="btn btn-primary" 
                       href="editar_producto.php?id_producto=<?php echo $fila["id_producto"]?>">Editar</a>
                </td>
                <td>
                    <form action="" method="post">
                        <!-- Asegúrate de que el campo oculto tenga el nombre correcto: id_producto -->
                        <input type="hidden" name="id_producto" value="<?php echo $fila["id_producto"] ?>">
                        <input class="btn btn-danger" type="submit" value="Borrar">
                    </form>
                </td>
                <?php
                    echo "</tr>";
            }
        ?>
        </tbody>
    </table>

    <!-- Botón Nuevo Producto fuera de la tabla -->
    <div>
        <a class="btn btn-primary" href="nuevo_producto.php">Nuevo Producto</a>
        <a class="btn btn-secondary" href="../index.php">Volver a Página Principal</a>
        <a class="btn btn-primary" href="../categorias/index.php">Ir a Categorías</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>