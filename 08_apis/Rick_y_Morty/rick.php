<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick y Morty</title>

    <!-- Código para mostrar errores -->
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
    ?>
</head>
<body>
    <form action="" method="GET">
        <!-- Cantidad de personajes -->
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad" min="1" value="<?php echo isset($_GET['cantidad']) ? $_GET['cantidad'] : ''; ?>"><br><br>

        <!-- Elegir Género -->
        <label for="genero">Género:</label>
        <select name="genero">
            <option value="" disabled selected>-- Elige una opción --</option>
            <option value="female" <?php echo (isset($_GET['genero']) && $_GET['genero'] === 'female') ? 'selected' : ''; ?>>Female</option>
            <option value="male" <?php echo (isset($_GET['genero']) && $_GET['genero'] === 'male') ? 'selected' : ''; ?>>Male</option>
        </select><br><br>

        <!-- Elegir Especie -->
        <label for="especie">Especie:</label>
        <select name="especie">
            <option value="" disabled selected>-- Elige una opción --</option>
            <option value="human" <?php echo (isset($_GET['especie']) && $_GET['especie'] === 'human') ? 'selected' : ''; ?>>Human</option>
            <option value="alien" <?php echo (isset($_GET['especie']) && $_GET['especie'] === 'alien') ? 'selected' : ''; ?>>Alien</option>
        </select><br><br>

        <button type="submit">Filtrar</button>
    </form>

    <?php
    // Controlo la cantidad de personajes
    if (!isset($_GET["cantidad"]) || $_GET["cantidad"] <= 0 || $_GET["cantidad"] == "") {
        $cantidad = 5;
    } else {
        $cantidad = $_GET["cantidad"];
    }

    // Controlo el tipo de Género
    $genero = isset($_GET["genero"]) ? $_GET["genero"] : '';

    // Controlo el tipo de Especie
    $especie = isset($_GET["especie"]) ? $_GET["especie"] : '';

    $apiURL = "https://rickandmortyapi.com/api/character";
    $personajesFiltrados = [];
    $page = 1;

    do {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$apiURL?page=$page");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos = json_decode($respuesta, true);
        $personajes = $datos["results"];

        foreach ($personajes as $personaje) {
            if (($genero === '' || $personaje["gender"] === $genero) &&
                ($especie === '' || $personaje["species"] === $especie)) {
                $personajesFiltrados[] = $personaje;
            }
        }

        $page++;
    } while (count($personajesFiltrados) < $cantidad && isset($datos["info"]["next"]));

    // Limitar la cantidad de personajes mostrados
    $personajesFiltrados = array_slice($personajesFiltrados, 0, $cantidad);
    ?>

    <h3>Personajes</h3>
    <table border="1">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Género</th>
                <th>Especie</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($personajesFiltrados as $personaje) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($personaje["name"]); ?></td>
                    <td><?php echo htmlspecialchars($personaje["gender"]); ?></td>
                    <td><?php echo htmlspecialchars($personaje["species"]); ?></td>
                    <td><img src="<?php echo htmlspecialchars($personaje["image"]); ?>" alt="<?php echo htmlspecialchars($personaje["name"]); ?>" style="width: 100px;"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>