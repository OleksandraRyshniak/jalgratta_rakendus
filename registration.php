<?php
require("funktsioonid.php");
if (!empty($_POST["sisestusnupp"])) {
    if (isset($_POST["eesnimi"])) {
        $eesnimi = trim($_POST["eesnimi"]);
    } else {
        $eesnimi = '';
    }

    if (isset($_POST["perekonnanimi"])) {
        $perekonnanimi = trim($_POST["perekonnanimi"]);
    } else {
        $perekonnanimi = '';
    }

    if ($eesnimi === '' || is_numeric($eesnimi)) {
        echo "Sisesta oma eesnimi!";
    } elseif ($perekonnanimi === '' || is_numeric($perekonnanimi)) {
        echo "Sisesta oma perekonnanimi!";
    } else {
        lisaKasutaja($eesnimi, $perekonnanimi);
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Kasutaja registreerimine</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("header.php");
include("nav_menu.php");
?><main>
<h2>Registreerimine</h2>

<form action="?" method="post">
    <dl>
        <dt>Eesnimi:</dt>
        <br>
        <dd><input type="text" name="eesnimi" id="eesnimi"/></dd>
        <br>
        <dt>Perekonnanimi:</dt>
        <br>
        <dd><input type="text" name="perekonnanimi" id="perekonnanimi"/></dd>
        <br>
        <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>  </dl>
</form>
</main>
<?php
//jalus
include("footer.php");
?>
</body>
</html>