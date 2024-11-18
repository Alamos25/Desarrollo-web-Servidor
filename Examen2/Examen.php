<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set("display_errors", 1 );  
    ?>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        $salida = stripslashes($salida);
        $salida = preg_replace('!\s+!', ' ', $salida);
        return $salida;
    }
    ?>
    <div class="container">
        <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = depurar($_POST["titulo"]);
            $tmp_paginas = depurar($_POST["paginas"]);
            if(isset($_POST["genero"])) {
                $tmp_genero = $_POST["genero"];
            } else {
                $tmp_genero = "";
            }
            if(isset($_POST["secuela"])) {
                $tmp_secuela = $_POST["secuela"];
            } else {
                $tmp_secuela = "";
            }
            $tmp_textarea = depurar($_POST["textarea"]);


            if($tmp_titulo == '') {
                $err_titulo = "El titulo es obligatorio";
            } else {
                if(strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 40) {
                    $err_titulo = "El titulo debe tener entre 2 y 40 caracteres";
                } else {
                    //  letras, espacios en blanco y tildes
                    $patron = "/^[a-zA-Z0-9 áéióúÁÉÍÓÚñÑ.,;]+$/";
                    if(!preg_match($patron, $tmp_titulo)) {
                        $err_titulo = "El titulo solo puede contener letras y espacios
                            en blanco";
                    } else {
                        $letra_titulo = substr($tmp_titulo,0,1);
                        $patron2 = "/^[0-9]$/";
                        if(preg_match($patron2, $letra_titulo)){
                            $err_titulo = "La primera letra tiene que ser una letra";
                        } else {
                            $titulo = ucwords(strtolower($tmp_titulo));
                        }
                    }
                }
            }

            if($tmp_paginas == '') {
                $err_paginas = "Las paginas son obligatorias";
            } else {
                if($tmp_paginas < 010 || $tmp_paginas > 9999){
                    $err_paginas = "Debes escribir un numero entre 001 y 999";
                } else {
                    $paginas = $tmp_paginas;
                }
            }

            if($tmp_genero == '') {
                $err_genero = "El genero es obligatoria";
            } else {
                $genero_validas = ["fantasia","ciencia_ficcion","romance","drama"];
                if(!in_array($tmp_genero,$genero_validas)) {
                    $err_genero = "El genero no es válido";
                } else {
                    $genero = $tmp_genero;
                }
            }

            if($tmp_secuela == "") {
                $tmp_secuela = "";
            } else {
                $valores_validos_secuela = ["si", "no"];
                if(!in_array($tmp_secuela, $valores_validos_secuela)) {
                    $err_secuela = "Solo puedes elegir que tenga secuela o que no";
                } else {
                    $secuela = $tmp_secuela;
                }
            }

            if($tmp_textarea == '') {
                $err_textarea = "El text area es obligatoria";
            } else {
                if(strlen($tmp_textarea) < 0 || strlen($tmp_textarea) > 201) {
                    $err_textarea = "El text area no puede contener mas de 200 letras";
                } else {
                    $patron = "/^[a-zA-Z áéióúÁÉÍÓÚñÑüÜ]+$/";
                    if(!preg_match($patron, $tmp_textarea)) {
                        $err_textarea = "El text area solo puede contener letras y espacios
                            en blanco, tildes y ñ.";
                    } else {
                        $textarea = $tmp_textarea;
                    }
                }
            }
        }
            ?>
            <h1>Formulario Libros</h1>

            <form class="col-4" action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Titulo</label>
                    <input class="form-control" type="text" name="titulo">
                    <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Numero de paginas</label>
                    <input class="form-control" type="text" name="paginas">
                    <?php if(isset($err_paginas)) echo "<span class='error'>$err_paginas</span>" ?>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="fantasia">
                    <label class="form-check-label">Fantasia</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="ciencia_ficcion">
                    <label class="form-check-label">Ciencia Ficción</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="romance">
                    <label class="form-check-label">Romance</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="genero" value="drama">
                    <label class="form-check-label">Drama</label>
                </div>
                <?php if(isset($err_genero)) echo "<span class='error'>$err_genero</span>" ?>
                
                <br><br>

                <select name="secuela">
                    <option disabled selected hidden>--- Elige si tiene secuela ---</option>
                    <option value="si">Si</option>
                    <option value="no">No</option>
                </select>
                <?php if(isset($err_secuela)) echo "<span class='error'>$err_secuela</span>"; ?>
                
                <br><br>

                <div class="mb-3">
                <label class="form-label">Text Area</label>
                <input class="form-control" type="text" name="textarea">
                </div>
                <?php if(isset($err_textarea)) echo "<span class='error'>$err_textarea</span>" ?>
            
                <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Enviar">
                </div>
            </form>
        <?php
        if(isset($titulo) && isset($paginas) && isset($genero)) { ?>
            <p><?php echo "Titulo: $titulo" ?></p>
            <p><?php echo "Numero de paginas: $paginas" ?></p>
            <p><?php echo "Genero: $genero" ?></p>
            <p><?php echo "Text Area: $textarea" ?></p>
        <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>