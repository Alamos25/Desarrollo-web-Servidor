<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        require('../util/conexion.php');

        session_start(); 
        if (!isset($_SESSION["usuario"])) { 
            header("Location: ../usuario/iniciar_sesion.php"); 
            exit();
        }

        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada, ENT_QUOTES, 'UTF-8'); 
            $salida = trim($salida); 
            $salida = stripslashes($salida); 
            $salida = preg_replace('/\s+/', ' ', $salida); 
            return $salida; 
        }
    ?>
</head>
<body>  
    <div class ="container">
        
        <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $categoria = depurar($_POST["categoria"]);

                    //$sql = "SELECT COUNT(*) as count FROM productos WHERE categoria = '$categoria'";
                    //$resultado = $_conexion->query($sql);
                    //$count = $resultado->fetch_assoc()["count"];

                    //1. Preparacion
                    $sql = $_conexion -> prepare("SELECT COUNT(*) as count FROM productos WHERE categoria = ?");

                    //2. Enlazado
                    $sql -> bind_param("s", 
                        $categoria
                    );

                    //3. Ejecución
                    $sql -> execute();

                    //4. Retrieve
                    $resultado = $sql -> get_result();

                    

                    if ($count > 0) {
                        echo "<p>No se elimina la categoría '$categoria' por tener un producto asociado. Borra el producto antes.</p>";
                    } else {
                        //$sql = "DELETE FROM categorias WHERE categoria = '$categoria'";
                        # 1.Prepare
                        $sql = $_conexion -> prepare("DELETE FROM categorias SET
                        categoria = ?
                        ");

                        # 2.Binding
                        $sql -> bind_param("s",
                        $categoria
                        );

                        //3. Ejecución

                    if ($sql -> execute()) {
                        echo "<p>La categoria se ha eliminado.</p>";
                    }
                }
            }
            
            $sql = "SELECT * FROM categorias";
            $resultado = $_conexion->query($sql);
        ?>
         
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Categoría</th>
                    <th>Descripción</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($fila = $resultado -> fetch_assoc()){
                        echo "<tr>";
                        echo "<td>". $fila["categoria"] ."</td>";
                        echo "<td>". $fila["descripcion"] ."</td>";
                    ?>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="categoria" value="<?php echo $fila["categoria"]?>">
                                <input class="btn btn-danger" type="submit" value="Borrar">
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="editar_categoria.php?categoria=<?php echo $fila["categoria"]?>">Editar</a>
                        </td>                    
                    <?php
                        echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
        <td>
            <a class="btn btn-secondary" href="nueva_categoria.php">Crear Categoría</a>
            <a class="btn btn-primary" href="../usuario/cerrar_sesion.php">Cerrar sesión</a>
            <a class="btn btn-secondary" href="../index.php">Volver</a>
        </td>   
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>