<?php

require('config.php');

  try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    if ($pdo) {
        // echo "De verbinding is gelukt";
    } else {
        echo "Interne server-error";
    }
  } catch(PDOException $e) {
    echo $e->getMessage();
  }

/**
 * Maak een select query die alle records uit de tabel Persoon haalt
 */
  $sql = "SELECT * FROM ";

  // Maak de sql-query gereed om te worden uitgevoerd op de database
  $statement = $pdo->prepare($sql);

  // Voer de sql-query uit op de database
  $statement->execute();

  // Zet het resultaat in een array met daarin de objecten (records uit de tabel Persoon)
  $result = $statement->fetchAll(PDO::FETCH_OBJ);

  // Even checken wat we terugkrijgen
  //    var_dump($result);

  $rows = "";
  foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->id</td>
                <td>$info->naamachtbaan</td>
                <td>$info->naampretpark</td>
                <td>$info->land</td>
                <td>$info->topsnelheid</td>
                <td>$info->hoogte</td>
                <td>$info->datum</td>
                <td>$info->cijfer</td>
                <td>
                    <a href='delete.php?Id=$info->id'>
                        <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                     <a href='update.php?Id=$info->id'>
                        <img src='img/b_edit.png' alt='potlood'>
                    </a>
                </td>
              </tr>";
  }
  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Persoonsgegevens</h3>

    <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>NaamAchtbaan</th>
            <th>NaamPretpark</th>
            <th>Land</th>
            <th>Topsnelheid</th>
            <th>Hoogte</th>
            <th>Datum</th>
            <th>Cijfer</th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
</body>
</html>