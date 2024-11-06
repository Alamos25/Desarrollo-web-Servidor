

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Formularios</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        require('../06_funciones/irpf.php');

        //- Nombre (letras con tilde, ñ, espacios en blanco y punto)
        //- Inicial (3 letras)
        //- Liga (select con las opciones: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF)
        //- Ciudad (letras con tilde, ñ, ç y espacios en blanco)
        //- Tiene titulo liga (select con si o no)
        //- Fecha de fundación (entre hoy y el 18 de diciembre de 1889)
        //- Número de jugadores (entre 19 y 32)
    ?>
</head>
<body>
    <h1>Formulario usuario</h1>

    <?php
    function depurar(string $entrada): string{// el primer String fuerza que sea un string, el segundo detras de : es para delvolver es un String, sino peta
        $salida = htmlspecialchars($entrada);//asi no se meten cosas de html
        $salida = trim ($salida);
        $salida = preg_replace('!\s+!', '', $salida);//quita los espacios sobrantes
        return $salida;
    }
    ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_nombre = $_POST["nombre"];
        $tmp_inicial = $_POST["inicial"];

        if(isset($_POST["liga"])) $tmp_liga = $_POST["liga"];
        else $tmp_liga ="";

        if($tmp_nombre == ''){
            $err_nombre = "El nombre es obligatorio";
        } else {
            if(strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 20) {
                $err_nombre = "El nombre debe tener entre 2 y 40 caracteres";
            } else {
                //letras, espacios en blanco y tildes
                $patron = "/^[a-zA-Z áéúóíÁÉÍÚÓÑñÜü\ñ\.]+$/";
                if(!preg_match($patron, $tmp_nombre)) {
                    $err_nombre = "El nombre solo puede contener letras y 
                        espacios en blanco, puntos, tildes y ñ";
                } else {
                    $nombre = $tmp_nombre;
                }
            }
        }

        if($tmp_inicial == ''){
            $err_inicial = "La inicial es obligatoria";
        } else {
            if(strlen($tmp_inicial) < 2 || strlen($tmp_inicial) > 40) {
                $err_inicial = "La inicial debe tener 3 caracteres";
            } else {
                //letras, espacios en blanco y tildes
                $patron = "/^[a-zA-Z]{3}+$/";
                if(!preg_match($patron, $tmp_inicial)) {
                    $err_inicial = "La inicial solo puede contener letras y 
                        3 caracteres";
                } else {
                    $inicio = $tmp_inicial;
                }
            }
        }

        if($tmp_liga == '') {
            $err_liga = "La liga es obligatoria";
        } else {
            $valores_validos_liga = ["liga_ea", "liga_hyper", "liga_rfef"];
            if(!in_array($tmp_liga, $valores_validos_liga)) {
                $err_liga = "La liga solo puede ser: Liga EA Sports, Liga Hypermotion, Liga Primera RFEF";
            } else {
                $liga= $tmp_liga;
            }
        }
    }
    ?>

    <form class="col-4" action="" method="post">
        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input class="form-control" type="text" name="nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>" ?>
        </div>
        <br>
        <div class="mb-3">
            <label class="form-label">Inicial</label>
            <input class="form-control" type="text" name="inicial">
            <?php if(isset($err_inicial)) echo "<span class='error'>$err_inicial</span>" ?>
        </div>
        <br>
        <div class="mb-3"></div>
        <select name="liga">
            <option disabled selected hidden>--- Elige una Liga ---</option>
            <option value="liga_ea">Liga EA Sports</option>
            <option value="liga_hyper">Liga Hypermotion</option>
            <option value="liga_rfef">Liga Primera RFEF</option>
        </select>
        <?php if(isset($err_liga)) echo "<span class='error'>$err_liga</span>"; ?>

        <div class="mb-3">
            <input class="btn btn-primary" type="submit" value="Enviar">
        </div>
    </form>
    <?php
        if(isset($usuario) &&isset($inicio)) {?>        
            <h1><?php echo $nombre ?></h1>
            <h1><?php echo $inicial ?></h1>
        <?php }
    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>
</html>