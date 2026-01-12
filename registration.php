<?php
require_once("config.php");
global $connect;
if(isSet($_REQUEST["sisestusnupp"])){
    $kask=$connect->prepare(
        "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
    $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]);
    $kask->execute();
    $connect->close();
    header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]"); exit();
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
?>
<h2>Registreerimine</h2>
<?php
if(isSet($_REQUEST["lisatudeesnimi"])){
   echo "Lisati $_REQUEST[lisatudeesnimi]";
}
?>
<form action="?">
    <dl>
        <dt>Eesnimi:</dt>
        <br>
        <dd><input type="text" name="eesnimi" id="eesnimi"/></dd>
        <br>
        <dt>Perekonnanimi:</dt>
        <br>
        <dd><input type="text" name="perekonnanimi" /></dd>
        <br>
        <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>  </dl>
</form>
<?php
//jalus
include("footer.php");
?>
</body>
</html>