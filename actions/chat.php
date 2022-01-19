<?php
include "../class/function.php";
$id = $_GET['postid'];
$func = new Functions;
$func->insertRoomId((int)$id);
exit();
