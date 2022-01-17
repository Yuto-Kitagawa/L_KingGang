<?php

include "../class/function.php";
session_start();

$func = new Functions();
$func->buy($_SESSION['id']);
