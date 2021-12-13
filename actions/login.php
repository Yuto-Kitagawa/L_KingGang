<?php
include "../class/function.php";


$id = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
$passwd = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

$func = new Functions;

$func->login($id, $passwd);
