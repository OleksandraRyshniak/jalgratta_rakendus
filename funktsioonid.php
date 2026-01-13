<?php
require("config.php");
global $connect;
function lisaKasutaja($eesnimi, $perekonnanimi)
{
    global $connect;
    $stmt = $connect->prepare("INSERT INTO jalgrattaeksam (eesnimi, perekonnanimi) VALUES (?, ?)");
    $stmt->bind_param("ss", $eesnimi, $perekonnanimi);
    $stmt->execute();
    $stmt->close();
}

function teooriatulemus($id, $teooriatulemus)
{
    global $connect;
    $stmt = $connect->prepare("UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $stmt->bind_param("ii", $teooriatulemus, $id);
    $stmt->execute();
    $stmt->close();
}

function naitaTabel()
{
    global $connect;
    $paring = $connect->prepare("SELECT id, eesnimi, perekonnanimi FROM jalgrattaeksam WHERE teooriatulemus<10");
    $paring->bind_result($id, $eesnimi, $perekonnanimi);
    $paring->execute();
    while($paring->fetch()){
    echo "<table>";
    echo "<tr>
    <td>$eesnimi</td>
    <td>$perekonnanimi</td>
    <td>
    <form method='post' action=''>
    <input type='hidden' name='id' value='$id' />
    <input type='text' name='teooriatulemus' />
    <input type='submit' value='Sisesta tulemus' />
    </form>
    </td>
    </tr>";
    echo "</table>";}
    $paring->close();
}

function slaalom_korras($id)
{
    global $connect;
    $kask=$connect->prepare(
        "UPDATE jalgrattaeksam SET slaalom=1 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
    $kask->close();
}

function slaalom_vigane($id)
{
    global $connect;
    $kask=$connect->prepare(
        "UPDATE jalgrattaeksam SET slaalom=2 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
    $kask->close();
}

function ringtee_korras($id)
{
    global $connect;
    $kask=$connect->prepare(
        "UPDATE jalgrattaeksam SET ringtee=1 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
    $kask->close();
}
function ringtee_vigane($id)
{
    global $connect;
    $kask=$connect->prepare(
        "UPDATE jalgrattaeksam SET ringtee=2 WHERE id=?");
    $kask->bind_param("i", $id);
    $kask->execute();
    $kask->close();
}
