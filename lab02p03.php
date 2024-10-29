   <?php
    $uzytkownicy = array(
        "AAAA" => "aaaa",
        "BBBB" => "bbbb",
        "CCCC" => "cccc"
    );
    ?>

   <!DOCTYPE html>
   <html lang="pl">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
   </head>

   <body>
       <h2>Logowanie:</h2>
       <?php
        if (!isset($_GET["user"]) || !isset($_GET["pass"])) {
            echo '<form action="" method="get">';
            echo '<label for="user">Użytkownik:</label>';
            echo '<input type="text" name="user" required>';
            echo '<label for="pass">Hasło:</label>';
            echo '<input type="password" name="pass" required>';
            echo '<input type="submit" value="Zaloguj się">';
            echo '</form>';
        }
        ?>


       <?php
        if (!isset($_GET["user"]) || !isset($_GET["pass"])) {
            echo "witaj gość";
            return;
        }
        $user = $_GET["user"];
        $pass = $_GET["pass"];

        $zal_uzytkownik = "Gość";
        foreach ($uzytkownicy as $u => $p) {
            if ($u === $user && $p === $pass)
                $zal_uzytkownik = $user;
        }
        echo "<p>Witaj: $zal_uzytkownik!</p>";
        ?>
   </body>

   </html>