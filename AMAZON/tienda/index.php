<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .btn {
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    require('./util/conexion.php');
    session_start();

    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada); 
        $salida = trim($salida); 
        $salida = stripslashes($salida); 
        $salida = preg_replace('!\s+', ' ', $salida); 
        return $salida; 
    }
    ?>
</head>
<body>
    <div class="container">

        <div class="justify-content-center"> 
            <?php if (isset($_SESSION["usuario"])) {
                echo "<h2>Bienvenid@ ". $_SESSION["usuario"] . "</h2>"; 
                } else { 
                    echo "<h2>Bienvenid@ invitado</h2>"; 
                } ?> 
        </div>

        <?php



            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $id_producto = depurar($_POST["id_producto"]);

                $sql = "DELETE FROM productos WHERE id_producto = $id_producto";
                if ($_conexion->query($sql)) {
                    echo "<p class='text-success'>El producto ha sido eliminado correctamente.</p>";
                } else {
                    echo "<p class='text-danger'>Error al eliminar el producto deseado: " . $_conexion->error . "</p>";
                }
            }

            $sql = "SELECT * FROM productos";
            $resultado = $_conexion->query($sql);
            ?>

            <?php
                if (isset($_SESSION["usuario"])) { ?>
                    <ul class="nav justify-content-end">               
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="categorias/index.php">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="productos/index.php">Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="usuario/modificar_contra.php">Modificar Contraseña</a>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="usuario/cerrar_sesion.php">Cerrar sesión</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="nav justify-content-end">
                        <li class="nav-item">
                            <a class="btn btn-primary" href="./usuario/nuevo_registro.php">Regístrate</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="./usuario/iniciar_sesion.php">Inícia Sesión</a>
                        </li>
                    </ul>
            <?php } ?>




        <!-- FIN NAVBAR -->

        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                    <th>Stock</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
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
                        <img width='100' height='150' src="./productos/imagen/<?php echo $fila["imagen"]; ?>" >
                    </td>
                    <?php
                    echo "<td>". $fila["descripcion"] ."</td>";
                    ?>
                    <?php
                        echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>