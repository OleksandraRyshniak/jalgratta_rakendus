<?php
require("funktsioonid.php");
require("config.php");
global $connect;
if(!empty($_REQUEST['korras_id'])){
    slaalom_korras($_REQUEST['korras_id']);
    header("Location:". $_SERVER['PHP_SELF']);
    exit;
}
if(!empty($_REQUEST["vigane_id"])){
    slaalom_vigane($_REQUEST['vigane_id']);
    header("Location:". $_SERVER['PHP_SELF']);
    exit;
}
$kask=$connect->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus>=10 AND slaalom=-1");  $kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html>
<head>
    <title>Slaalom</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("header.php");
include("nav_menu.php");
?>
<main>
<h2>Slaalom</h2>
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td> 
 <a href='?korras_id=$id'>Korras</a>
 <a href='?vigane_id=$id'>Ebaõnnestunud</a> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
<?php
//jalus
include("footer.php");
?></main>
</body>
</html>
