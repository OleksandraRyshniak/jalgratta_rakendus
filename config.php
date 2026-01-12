<?php
$serverinimi='localhost';
$kasutajanimi='oleksandraryshniak';
$parool='789poli76';
$andmebaasinimi='oleksandraryshniak';
$yhendus=new mysqli($serverinimi, $kasutajanimi, $parool, $andmebaasinimi);
$yhendus->set_charset("utf8");
