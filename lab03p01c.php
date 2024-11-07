<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Forum</h2>
    <hr><hr>
    <?php
    $plik = @fopen("dane.txt", "r");
    if (!($plik)) {
        echo "Jeszcze nie ma żadnych wpisów";
        return;
    }
    $caly_plik = fread($plik, filesize("dane.txt"));

    $tablica = explode(";", $caly_plik);
    $poz =0;
    while($poz < count($tablica) && !empty($tablica[$poz]))
    {
        echo "<artricle>";
        echo "<header>$tablica[$poz]</header>";
        $poz++;
        echo "<main>$tablica[$poz]</main>";
        $poz++;
        echo "<footer>$tablica[$poz]</footer>";
        $poz++;
        echo "</artricle>";
        echo "<hr><hr>";
    }

    ?>


</body>

</html>