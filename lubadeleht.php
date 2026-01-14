<?php
require("funktsioonid.php");
require("config.php");
global $connect;
if(!empty($_REQUEST['vormistamine_id'])){
    vormistamine($_REQUEST['vormistamine_id']);
    header("Location:". $_SERVER['PHP_SELF']);
    exit;
}
if(!empty($_REQUEST["kustutusid"])){
    kustuta($_REQUEST['kustutusid']);
    header("Location:". $_SERVER['PHP_SELF']);
    exit;
}
$kask=$connect->prepare(
    "SELECT id, eesnimi, perekonnanimi, teooriatulemus,  
 slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus,   $slaalom, $ringtee, $t2nav, $luba);
$kask->execute();
function asenda($nr){
    if($nr==-1){return ".";} //tegemata
    if($nr== 1){return "korras";}
    if($nr== 2){return "ebaõnnestunud";}
    return "Tundmatu number";
}

?>
<!doctype html>
<html>
<head>
    <title>Lõpetamine</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include("header.php");
include("nav_menu.php");
?><main>
<h2>Lõpetamine</h2>
<table>
    <tr>
        <th>Eesnimi</th>
        <th>Perekonnanimi</th>
        <th>Teooriaeksam</th>
        <th>Slaalom</th>
        <th>Ringtee</th>
        <th>Tänavasõit</th>
        <th>Lubade väljastus</th>
        <th>Kustuta</th>
    </tr>
    <?php
    while($kask->fetch()){
        $asendatud_slaalom=asenda($slaalom);
        $asendatud_ringtee=asenda($ringtee);
        $asendatud_t2nav=asenda($t2nav);
        $loalahter=".";
        if($luba==1){$loalahter="Väljastatud";}
        if($luba==-1 and $t2nav==1){
            $loalahter="<a href='?vormistamine_id=$id'>Vormista load</a>";  }
        echo " 
 <tr> 
 <td>$eesnimi</td> 
 <td>$perekonnanimi</td> 
 <td>$teooriatulemus</td> 
 <td>$asendatud_slaalom</td> 
 <td>$asendatud_ringtee</td> 
 <td>$asendatud_t2nav</td> 
 <td>$loalahter</td> ";
echo "<td><a href='?kustutusid=$id'>Kustuta</a></td>";
 "</tr> 
 ";
    }
    ?>
</table></main>
<?php
//jalus
include("footer.php");
?>
</body>
</html>
