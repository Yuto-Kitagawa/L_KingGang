<?php
include "../class/function.php";

$item = htmlspecialchars($_POST['item'], ENT_QUOTES, 'UTF-8');
header('Location: ../view/search.php?item=' . $item);
exit();
