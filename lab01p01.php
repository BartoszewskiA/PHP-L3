<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <title></title>
</head>

<body>

  <?php
  $wiersze = 100;
  $kolumny = 500;
  echo "<table>";
    for($i=0; $i<$wiersze; $i++)
    {
      echo '<tr>';
      for($j=0; $j<$kolumny; $j++)
        
      echo "<td>",$i*$kolumny+$j,"</td>";
      echo '</tr>';
    }

  echo "</table>";
  ?>
</body>

</html>