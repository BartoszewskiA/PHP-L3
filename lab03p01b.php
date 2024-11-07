<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_POST["tytul"]) || !isset($_POST["tresc"]) || !isset($_POST["imie"])) {
        echo "<p>BRAK WPISU</p>";
        echo "<a href=\"lab03p01a.html\">Powrót do panelu administracyjnego</a>";
        return;
    }
    $tytul = $_POST["tytul"];
    $tresc = $_POST["tresc"];
    $podpis = $_POST["imie"];
    $plik = @fopen("dane.txt", "a");
    if (!($plik)) {
        echo "Błąd otwarcia pliku.";
        return;
    }
    $wpis = $tytul.";".$tresc.";".$podpis.";";
    fwrite($plik,$wpis);
    fclose($plik);
    echo "<p>dziękujemy za opublikowanie postu</p>";
    echo
    "<a href=\"lab03p01a.html\">Powrót do panelu administracyjnego</a>";
    ?>

</body>

</html>