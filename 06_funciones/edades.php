<?php

    function comprobarEdad($nombre, $edad) {
        if($edad < 18){
            echo "<p>El nombre es: $nombre</p>";
        } elseif ($edad >= 18 && $edad <= 65){
            echo "<p>El nombre es: $nombre y tiene: $edad</p>";
        } elseif ($edad > 65){
            echo "<p>El nombre es: $nombre y esta jubilado</p>";
        } else{
            echo "<p>Edad no valida</p>";
        }
    } 
?>