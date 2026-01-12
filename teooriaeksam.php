<?php
require_once("config.php");
global $connect;
if(!empty($_REQUEST["teooriatulemus"])){
    $kask=$connect->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]); $kask->execute();
}
$kask=$connect->prepare("SELECT id, eesnimi, perekonnanimi   FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
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
<table>
    <?php
    while($kask->fetch()){
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td><form action=''> 
 <input type='hidden' name='id' value='$id' /> 
 <input type='text' name='teooriatulemus' />
 <input type='submit' value='Sisesta tulemus' /> 
 </form> 
 </td> 
</tr> 
 ";
    }
    ?>
</table>
</main>
<?php
//jalus
include("footer.php");
?>
</body>
</html>