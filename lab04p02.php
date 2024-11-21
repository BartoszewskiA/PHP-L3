<?php
session_start();
if(isset($_POST['usun']))
    session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_GET['wartosc']) && is_numeric($_GET['wartosc'])) {
        $c = $_GET['wartosc'];
        $_SESSION['wartosc'] = $c;
    } elseif (isset($_SESSION['wartosc'])) {
        $c = $_SESSION['wartosc'];
    } else {
        $c = 0;
    }
    echo "<form method=\"get\">";
    echo "<input type=\"number\" name=\"wartosc\" value=\"$c\"/>";
    echo "<input type=\"submit\" value=\"Przelicz\"/>";
    echo "</form>";
    ?>
    <hr>
    <?php
    $f = $c * 1.8 + 32;
    echo "<p>$c C = $f F";
    ?>
    <hr>
    <form method="post">
        <input type="hidden" name="usun"/>
        <input type="submit" value="Usuń zapamiętane dane"/>
    </form>
</body>

</html>