<?php

require('config.php');

// connect to database using PDO
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
try {
    $pdo = new PDO($dsn, $db_user, $db_password, $options);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $sql = "UPDATE achtbaan
            SET NaamAchtbaan = :naamachtbaan,
                NaamPretpark = :naampretpark,
                Land = :land,
                Topsnelheid = :topsnelheid,
                Hoogte = :hoogte,
                Datum = :datum,
                Cijfer = :cijfer
            WHERE Id = :id";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(':naamachtbaan', $_POST['naamachtbaan'], PDO::PARAM_STR);
    $statement->bindValue(':naampretpark', $_POST['naampretpark'], PDO::PARAM_STR);
    $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topsnelheid', $_POST['topsnelheid'], PDO::PARAM_STR);
    $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_STR);
    $statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
    $statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_STR);
    $statement->bindValue(':id', $_POST['Id'], PDO::PARAM_STR);

    $statement->execute();

    echo "Het updaten is gelukt";
    header('Refresh:3; url=read.php');

    exit();
}

$sql = "SELECT * FROM achtbaan WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waade te kopplen aan de placeholder :Id
$statement = $pdo->prepare($sql);
// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);



//Voer de query uit

$statement->execute();
//Haal het resultaat op met fetch en stop het object in de variabal $result
$result = $statement->fetch(PDO::FETCH_OBJ);
//var_dump($result);  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>

<body>
    <H1>PHP PDO CRUD</H1>

    <form action="update.php" method="post">
        <input type = "hidden" name = "Id" value="<?= $result->id; ?>"
        <label for="naamachtbaan">Naam achtbaan:</label><br>
    <input type="text" id="naamachtbaan" name="naamachtbaan" value="<?= $result->naamachtbaan; ?>"required> <br>
    -----------------------------------------------------------------------------------------------------------------------------------

    <label for="naampretpark">Naam Pretpark:</label><br>
    <input type="text" id="naampretpark" name="naampretpark" value="<?= $result->naampretpark; ?>" required> <br>
-----------------------------------------------------------------------------------------------------------------------------------
    <label for="land">Naam Land:</label><br>
    <input type="text" id="land" name="land" value="<?= $result->land; ?>" required> <br>
    -----------------------------------------------------------------------------------------------------------------------------------

    <label for="topsnelheid">Topsnelheid:</label><br>
    <input type="number" id="topsnelheid" name="topsnelheid" min="1" max="200" value="<?= $result->topsnelheid; ?>" required><br>
    -----------------------------------------------------------------------------------------------------------------------------------

    <label for="hoogte">Hoogte:</label><br>
    <input type="number" id="hoogte" name="hoogte" min="1" max="200" value="<?= $result->hoogte; ?>" required><br>
    -----------------------------------------------------------------------------------------------------------------------------------

    <label for="datum">Datum eerste opening:</label><br>
    <input type="date" id="datum" name="datum" value="<?= $result->datum; ?>" required><br>
    -----------------------------------------------------------------------------------------------------------------------------------

    <label for="cijfer">Cijfer voor achtbaan:</label><br>
    <input type="range" id="cijfer" name="cijfer" min="1" max="10" step="0.1" onchange="document.getElementById('cijfer-output').value = this.value;"><br>
    <output for="cijfer" id="cijfer-output">5</output><br>
    -----------------------------------------------------------------------------------------------------------------------------------

        <input type="submit" value="Verzenden">
    </form>
    </form>
</body>

</html>