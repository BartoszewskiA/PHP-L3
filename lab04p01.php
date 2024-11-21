<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if(isset($_GET['wartosc']) && is_numeric($_GET['wartosc']))
    {
        $temp = $_GET['wartosc'];
    } elseif (isset($_COOKIE['pop']) && !empty($_COOKIE['pop'])) {
        $temp = $_COOKIE['pop'];
    } else {
        $temp = 0;
    }
    echo "<form method=\"get\">";
    echo "<input type=\"number\" name=\"wartosc\" value=\"$temp\"/>";
    echo "<input type=\"submit\" value=\"Przelicz\"/>";
    echo "</form>";
    ?>

    <?php
    if (!isset($_GET['wartosc']) || !is_numeric($_GET['wartosc'])) {
        echo "<p>Podaj prawidłową wartość temperatury</p>";
        return;
    }
    $c = $_GET['wartosc'];
    $f = $c * 1.8 + 32;
    echo "<p>$c C = $f F";
    setcookie("pop", $c, time() + 60 * 60 * 24 * 30);
    ?>
</body>

</html>