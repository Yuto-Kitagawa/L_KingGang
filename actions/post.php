<?php

include "../class/function.php";

$title = $_POST['title'];
$pic1 = $_FILES['pic1']['name'];

if (empty($_FILES['pic1']['name'])) {
    header('Location: ../view/post.php?err=1');
    exit();
} else {
    $pic1 = $_FILES['pic1']['name'];
    $pic1_tmp = $_FILES['pic1']['tmp_name'];
}

if (!empty($_FILES['pic2']['name'])) {
    $pic2 = $_FILES['pic2']['name'];
    $pic2_tmp = $_FILES['pic2']['tmp_name'];
} else {
    $pic2 = null;
    $pic2_tmp = null;
}

if (!empty($_FILES['pic3']['name'])) {
    if ($pic2 == null) {
        $pic2 = $_FILES['pi3']['name'];
        $pic2_tmp = $_FILES['pic3']['tmp_name'];
    } else {
        $pic3 = $_FILES['pi3']['name'];
        $pic3_tmp = $_FILES['pic3']['tmp_name'];
    }
} else {
    $pic3 = null;
    $pic3_tmp = null;
}

if (!empty($_POST['content'])) {
    $content = $_POST['content'];
}
if (!empty($_POST['season'])) {
    $season = $_POST['season'];
} else {
    $season = null;
}

if (!empty($_POST['category'])) {
    $cate = $_POST['category'];
} else {
    $cate = null;
}

if (!empty($_POST['price'])) {
    $price = $_POST['price'];
}

if (!empty($_POST['location'])) {
    $location = $_POST['location'];
}

$func = new Functions();
// 下2行コメント外す
session_start();
$id = $_SESSION['id'];
$func->post($id, $title, $content, $pic1, $pic1_tmp, $pic2, $pic2_tmp, $pic3, $pic3_tmp, $price, $location, $cate, $season);
