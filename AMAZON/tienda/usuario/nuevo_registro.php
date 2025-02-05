<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .error{
            color:red;
        }
    </style>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

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
    <?php
    $usuario = ''; 
        $err_usuario = $err_contrasena = $err_confirmar_contrasena = '';
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $tmp_usuario = depurar($_POST["usuario"]);
            $tmp_contrasena = depurar($_POST["contrasena"]);


            if($tmp_usuario == ''){
                $err_usuario = "Obligatorio poner usuario";
            }else{
                $patron = "/^[a-zA-Z0-9]+$/";
                if(!preg_match($patron,$tmp_usuario)){
                    $err_usuario = "El usuario solo acepta letras y números";
                }else{
                    if(strlen($tmp_usuario) < 3 || strlen($tmp_usuario) > 15){
                        $err_usuario = "El usuario tiene que tener entre 3 y 15 caracteres";
                    }else{
                        $usuario = $tmp_usuario;
                    }
                }
            }

            if($tmp_contrasena == ''){
                $err_contrasena = "Constraseña obligatoria";
            }else{
                $patron ="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}$/";
                if(!preg_match($patron,$tmp_contrasena)){
                    $err_contrasena = "Obligatorio en la contraseñas: Mayusculas, minusculas, numeros y caracteres especiales.";
                }else{
                    if(strlen($tmp_contrasena) < 8 || strlen($tmp_contrasena) > 15){
                        $err_contrasena = "La contraseña tiene que tener minimo 8 y 15 caracteres maximo";
                    }else{
                        $contrasena = $tmp_contrasena;
                    }
                }
            }
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $resultado = $_conexion -> query($sql);

            if($resultado -> num_rows == 1){
                $err_usuario = "Usuario no disponible";
            }else{
                if(isset($usuario,$contrasena)){
                    $contrasena_cifrada = password_hash($contrasena,PASSWORD_DEFAULT);
    
                    $sql = "INSERT INTO usuarios VALUES ('$usuario','$contrasena_cifrada')";
                    $_conexion -> query($sql);
    
                    header("location: iniciar_sesion.php");
                    exit;
                }
            }
            
            

        }

    ?>

    <div class="container">
        <h1>Registro</h1>
        <form class = "col-6" action = "" method= "post" enctype ="multipart/form-data">
        <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" type="text" name="usuario">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>" ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" type="password" name="contrasena">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>" ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-secondary" type="submit" value="Registrarse">
                <a class="btn btn-primary" href="../index.php">Volver</a>
            </div>           
        </form>
        <div class="mb-3">
            <h3>¿Ya tienes cuenta? Pincha aqui.</h3>
            <a class="btn btn-primary" href="iniciar_sesion.php">Iniciar sesion</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>