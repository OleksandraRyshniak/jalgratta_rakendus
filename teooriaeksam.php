<?php
require_once("funktsioonid.php");
if (isset($_REQUEST['teooriatulemus'])){
    teooriatulemus($_REQUEST['id'], $_REQUEST['teooriatulemus']);
    header("Location:". $_SERVER['PHP_SELF']);
    exit;
}
?>
<!doctype html>
<html>
<head>
    <title>Teooriaeksam</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("header.php");
include("nav_menu.php");
?>
<main>
<h2>Teooria eksam</h2>
<?php
naitaTabel();
?>
</main>
<?php
include("footer.php");
?>
</body>
</html>