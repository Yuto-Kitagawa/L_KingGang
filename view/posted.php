<?php
session_start();

include "../class/function.php";
$func = new Functions;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- https://kit.fontawesome.com -->
    <link rel="stylesheet" href="./index.css">
    <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
    <title></title>
    </style>
</head>

<body>
    <!-- 画面上のナビゲーションバー -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./home.php"><i class="fas fa-crown text-warning h4"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">投稿</a>
                    </li>
                    <!-- ドロップダウンメニュー -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['username'] ?></a>
                        <ul id="menu-bar" class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#profile">プロフィール</a></li>
                            <li><a class="dropdown-item" href="#">購入履歴</a></li>
                            <li><a class="dropdown-item" href=".posted.php">投稿履歴</a></li>
                            <li><a class="dropdown-item" href="../actions/logout.php">ログアウト</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="../actions/searchitem.php" method="POST" class="d-flex">
                    <input class="form-control me-2" name="item" type="search" placeholder="商品を検索" aria-label="Search" required>
                    <button class="btn btn-outline-dark" type="submit" style="white-space: nowrap;">検索</button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        <h1 class="w-100 text-center lead display-6 pt-5">投稿履歴</h1>
        <div id="posted">
            <div class="w-100 d-flex flex-wrap-reverse">
                <?php
                $user_hisytory_array = $func->getPostItems($_SESSION['id']);
                // var_dump($_SESSION['id']);
                // die();
                if ($user_hisytory_array == false) {
                    echo "<h2 style='padding-top:20%;widt:100%;text-align:center;'>投稿履歴はありません</h2>";
                } else {
                    while ($history = $user_hisytory_array->fetch_assoc()) {
                        $post = $func->getDetail($history['post_No'])->fetch_assoc();
                ?>
                        <div class="col-3 col-lg-4 px-5 my-5 slide" style="height: 40vh;">
                            <a class="card h-100 text-decoration-none" href="post_detail.php?id=<?= $history['post_No'] ?>">
                                <img class="h-50" style="object-fit: cover;" src="../img/<?= $post['detail_Image1'] ?>" width="100%" alt="">
                                <strong class="w-100 text-center text-black pt-5" style="font-size:1.2em;"><?= $history['post_Name'] ?></strong>
                            </a>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </main>

    <script src="./dropdown.js"></script>
</body>

</html>