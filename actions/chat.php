<?php
include "../class/function.php";
$id = $_GET['postId'];
$func = new Functions;
$func->insertRoomId($id);
exit();