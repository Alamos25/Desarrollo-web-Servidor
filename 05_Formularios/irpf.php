<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../06_funciones/irpf.php');
    ?>

</head>
<body>
    <form action="" method="post">
        <input type="text" name="salario" placeholder="Salario">
        <input type="submit" value="Calcular salario bruto">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_salario = $_POST["salario"];

        if($tmp_salario <= 0){
            echo "<p>El salario tiene que ser mayor que 0</p>";
        } elseif($tmp_salario == '' && $tmp_salario <= 0) {
            echo "<p>El salario tiene que ser mayor que 0</p>";
        } else {
            if(filter_var($tmp_salario, FILTER_VALIDATE_INT) === FALSE){
                echo "<p>El salario tiene que ser un numero</p>";
            } else {
                $salario = $tmp_salario;
            }
        }

        if(isset($salario)) {
            $salario = calcularIRPF($salario);
            echo "<p>El resultado es $salario</p>";
        }

    }
    ?>
</body>
</html>