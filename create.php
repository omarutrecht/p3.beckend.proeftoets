<?php

require('config.php');

// bereid de query voor
$sql = "INSERT INTO achtbaan (NaamAchtbaan, NaamPretpark, Land, Topsnelheid, Hoogte, Datum, Cijfer) 
        VALUES (:naamachtbaan, :naampretpark, :land, :topsnelheid, :hoogte, :datum, :cijfer)";
$stmt = $db->prepare($sql);

// haal de gegevens op uit het formulier
$naamachtbaan = $_POST['naamachtbaan'];
$naampretpark = $_POST['naampretpark'];
$land = $_POST['land'];
$topsnelheid = $_POST['topsnelheid'];
$hoogte = $_POST['hoogte'];
$datum = $_POST['datum'];
$cijfer = $_POST['cijfer'];

// bind de parameters en voer de query uit
$stmt->bindValue(':naamachtbaan', $naamachtbaan);
$stmt->bindValue(':naampretpark', $naampretpark);
$stmt->bindValue(':land', $land);
$stmt->bindValue(':topsnelheid', $topsnelheid);
$stmt->bindValue(':hoogte', $hoogte);
$stmt->bindValue(':datum', $datum);
$stmt->bindValue(':cijfer', $cijfer);

if ($stmt->execute()) {
        echo "Record created successfully";
        header('Refresh:2; url=read.php');
    } else {
        echo "Error creating record: " . $stmt->errorInfo()[2];
        header('Refresh:2; url=read.php');
    }

?>