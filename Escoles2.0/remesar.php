<?php
$mes = $_POST['mes'];
require_once 'classes/assentament.php';

$assentaments = new assentament();
$assentaments->remesar($mes);