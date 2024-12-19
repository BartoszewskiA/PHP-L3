<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Ścieżka do pliku JSON
    $path = "zamowienie.json";
    //Sprawdzamy czy plik jstnieje
    if (!file_exists($path)) {
        echo "Brak zamówienia";
        return;
    }
    $zamowienieJSON = file_get_contents($path);
    $zamowienie = json_decode($zamowienieJSON);
    if(!is_object($zamowienie)){
        echo "błąd dekodowania pliku";
        return;
    }
    // var_dump($zamowienie);
    $cpu = $zamowienie->cpu;
    $ram = $zamowienie->ram;
    $gpu = $zamowienie->gpu;
    $imie = $zamowienie->zamawiajacy->imie;
    $nazwisko = $zamowienie->zamawiajacy->nazwisko;

    echo "$cpu<br>
    $ram <br>
    $gpu<br>
    $imie <br>
    $nazwisko";
    ?>
</body>
</html>