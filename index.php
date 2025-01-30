<?php

require_once("class/database.class.php");

$con = new Database();
$link = $con->getConexao();

$smtm = $link->prepare("select * from usuarios");
$smtm->execute();

$data = $smtm->fetchAll();

print_r($data);

echo "Olá mundo!";