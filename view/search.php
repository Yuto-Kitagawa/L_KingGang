<?php

include "../class/function.php";
$func = new Functions;
$item = $_GET['item'];
session_start();

?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- https://kit.fontawesome.com -->
    <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
    <title></title>
    <style>
        .load {
            width: 100vw;
            height: 100vh;
            z-index: 999;
            padding-top: 25vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background: white;
        }

        .loaded {
            opacity: 0;
            transition: all 1s;
            visibility: hidden;
        }

        .form-control:focus {
            border-color: #6d6d6d;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(90, 90, 90, 0.6);
        }
    </style>
</head>

</html>

<body>
    <div class="load" role="status" id="load">
        <div class="spinner-border text-dark align-middle m-auto d-flex p-5"></div>
    </div>
    <!-- 画面上のナビゲーションバー -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">キングガング</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-current="page" href="#index.html">ホーム</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="post.php">投稿</a>
                        </li>
                        <!-- ドロップダウンメニュー -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['username'] ?></a>
                            <ul id="menu-bar" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#profile">プロフィール</a></li>
                                <li><a class="dropdown-item" href="#">購入履歴</a></li>
                                <li><a class="dropdown-item" href="#">投稿履歴</a></li>
                                <li><a class="dropdown-item" href="../actions/logout.php">ログアウト</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center align-items-center">
                        <?php
                        if (!isset($_SESSION['id'])) { ?>
                            <?php
                            ?>
                            <li class="nav-item list-unstyled ">
                                <a class="nav-link active text-dark" aria-current="page" href="login.html">ログイン</a>
                            </li>
                            <li class="nav-item list-unstyled ">
                                <a class="nav-link active text-dark" aria-current="page" href="createUser.html">新規登録</a>
                            </li>
                        <?php
                        }
                        ?>
                    </div>

                    <form action="../actions/searchitem.php" method="POST" class="d-flex">
                        <input class="form-control me-2" name="item" type="search" placeholder="Search" aria-label="Search" required>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="w-100">
            <div class="d-flex justify-content-around flex-wrap">
                <?php
                $result_array = $func->getItemsList($item);
                while ($result = $result_array->fetch_assoc()) {
                    $detail = $func->getItemsListDetail($result['post_No'])->fetch_assoc();
                ?>
                    <div class="m-3">
                        <div class="card" style="width: 18rem;">
                            <img src="../img/<?= $detail['detail_Image1'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-around">
                                    <h5 class="card-title"><?= $result['post_Name'] ?></h5>
                                    <div class="price lead">￥<?= $detail['detail_Price'] ?></div>
                                </div>
                                <hr>
                                <p class="card-text text-center w-100"><?= $detail['detail_explanation'] ?></p>
                                <a href="./post_detail.php?id=<?= $result['post_No'] ?>" class="btn btn-outline-primary w-100">詳細</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </main>
    <script>
        window.onload = function() {
            const spinner = document.getElementById('load');
            spinner.classList.add('loaded');
        }
    </script>
    <script src="./dropdown.js"></script>
</body>

</html>