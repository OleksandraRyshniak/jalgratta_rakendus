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