<?php
    $_servidor = "127.0.0.1";
    $_usuario = "estudiante";
    $_contrasena = "estudiante";
    $_base_de_datos = "tienda_bd";

    

    $_conexion = new mysqli($_servidor,$_usuario,$_contrasena, $_base_de_datos) //instancia un objeto
        or die("Error de conexión");
?>