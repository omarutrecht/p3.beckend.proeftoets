<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>De 5 snelste achtbanen van Europa</h1>

<form method="post" action="create.php">
    <label for="naamachtbaan">Naam achtbaan:</label><br>
    <input type="text" id="naamachtbaan" name="naamachtbaan" required> <br>

    <label for="naampretpark">Naam Pretpark:</label><br>
    <input type="text" id="naampretpark" name="naampretpark" required> <br>

    <label for="land">Naam Land:</label><br>
    <input type="text" id="land" name="land" required> <br>

    <label for="topsnelheid">Topsnelheid:</label><br>
    <input type="number" id="topsnelheid" name="topsnelheid" min="1" max="200" required><br>

    <label for="hoogte">Hoogte:</label><br>
    <input type="number" id="hoogte" name="hoogte" min="1" max="200" required><br>

    <label for="datum">Datum eerste opening:</label><br>
    <input type="date" id="datum" name="datum" required><br>

    <label for="cijfer">Cijfer voor achtbaan:</label><br>
    <input type="range" id="cijfer" name="cijfer" min="1" max="10" step="0.1" onchange="document.getElementById('cijfer-output').value = this.value;"><br>
    <output for="cijfer" id="cijfer-output">5</output><br>

    <input type="submit" value="Versturen">
</form>
</body>
</html>