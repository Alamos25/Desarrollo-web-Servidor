<h1>Encuentra los Múltiplos</h1>
    <form action="" method="post">
        <label for="a">Numero a:</label>
        <input type="number" name="a">
        <br>
        <label for="b">Número b:</label>
        <input type="number" name="b">
        <br>
        <label for="c">Número c:</label>
        <input type="number" name="c">
        <br>
        <input type="submit" value="Calcular Múltiplos">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = intval($_POST['a']);
        $b = intval($_POST['b']);
        $c = intval($_POST['c']);

        echo "<h2>Múltiplos de $c entre $a y $b:</h2>";
        $multiples = [];

        for ($i = $a; $i <= $b; $i++) {
            if ($i % $c == 0) {
                $multiples[] = $i;
            }
        }

        if (count($multiples) > 0) {
            echo "<ul>";
            foreach ($multiples as $multiple) {
                echo "<li>$multiple</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay múltiplos de $c entre $a y $b.</p>";
        }
    }
    ?>