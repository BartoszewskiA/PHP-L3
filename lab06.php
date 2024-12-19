<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <select name="cpu">
            <option value="brak">Nie wybrane</option>
            <option value="i3">Intel i3</option>
            <option value="i5">Intel i5</option>
            <option value="i7">Intel i7</option>
            <option value="i9">Intel i9</option>
        </select>
        <br><br>
        <select name="ram">
            <option value="brak">Nie wybrane</option>
            <option value="8 GB">8 GB</option>
            <option value="16 GB">16 GB</option>
            <option value="32 GB">32 GB</option>
            <option value="64 GB">64 GB</option>
        </select>
        <br><br>
        <select name="gpu">
            <option value="brak">Nie wybrane</option>
            <option value="zintegrowana">Zintegrowana</option>
            <option value="Radeon 3040">Radeon 3040</option>
            <option value="Radeon 4060">Radeon 4060</option>
            <option value="Radeon 4070">Radeon 4070</option>
        </select>
        <br><br>
        <input type="text" name="imie" placeholder="Imię" />
        <input type="text" name="nazwisko" placeholder="Nazwisko" />
        <input type="submit" value="Wyślij zamówienie" />
    </form>

    <?php
    if (
        !isset($_POST['imie']) || !isset($_POST['nazwisko'])
        || empty($_POST['imie']) || empty($_POST['nazwisko'])
    ) {
        echo "<br><hr><p>Podaj dane do zamówienia</p>";
        return;
    }
    $cpu = $_POST['cpu'];
    $ram = $_POST['ram'];
    $gpu = $_POST['gpu'];
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    // $zamawiajacy = array("imie"=>$imie, "nazwisko"=>$nazwisko);
    $zamawiajacy = compact("imie","nazwisko");
    $zamowienie = compact("cpu","ram","gpu","zamawiajacy");
    // var_dump($zamowienie);
    $zamowienieJSON = json_encode(
        $zamowienie,
        JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
    );
    //Sprawdzenie poprawności konwersji
    if ($zamowienieJSON === false) {
        echo "Błąd podczas kodowania JSON: " . json_last_error_msg();
        exit;
    }
    $filePath = "zamowienie.json";
    if (file_put_contents($filePath, $zamowienieJSON) !== false) {
        echo "Zamówienie zostało zapisane do pliku: $filePath";
    } else {
        echo "Błąd podczas zapisywania pliku.";
    }
    ?>
</body>

</html>