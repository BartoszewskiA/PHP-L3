<?php
$url = 'http://api.nbp.pl/api/exchangerates/rates/a/eur?format=json';
$plikJSON = file_get_contents($url);
$tablicaDanych = json_decode($plikJSON); // dane będą przetwarzane jako tablica obiekt
$kurs = $tablicaDanych->rates[0]->mid;
$data = $tablicaDanych->rates[0]->effectiveDate;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="get">
        <input type="number" placeholder="PLN" name="pln" />
        <br><br>
        <input type="number" placeholder="EURO" name="euro" />
        <br><br>
        <input type="submit" value="przelicz" />
    </form>
    <br>
    <?php
    echo "<p>Kurs euro z dnia: $data wynosi: $kurs PLN</p>";
    
    if (isset($_GET['pln']) && is_numeric($_GET['pln'])) {
        $pln = $_GET['pln'];
        $wynik = number_format($pln / $kurs, 2, ",", " ");
        echo "$pln PLN = $wynik EURO";
    } elseif (isset($_GET['euro']) && is_numeric($_GET['euro'])) {
        $euro = $_GET['euro'];
        $wynik = $euro * $kurs;
        echo "$euro EURO = $wynik PLN";
    }
    ?>

</body>

</html>