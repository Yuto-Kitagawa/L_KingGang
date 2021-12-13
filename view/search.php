<?php

include "../class/function.php";
$func = new Functions;
$item = $_GET['item'];

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><i class="fas fa-crown text-warning h4"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./post.php">投稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">設定</a>
                    </li>
                </ul>
                <form action="../actions/searchitem.php" class="d-flex">
                    <input class="form-control mx-2" name="item" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        <?php
        $results_array = $func->getItems($item);
        while ($result = $results_array->fetch_assoc()) {
            $post_details = $func->getDetail($result['post_No']);
        ?>
            <div class="item-wrapper">
                <div class="item-list d-flex">
                    <div class="item-img">
                        <img src="<?= $result['image'] ?>" width="15vw" alt="">
                    </div>
                    <div class="item-title">
                        <?= $result['post_Name'] ?>
                    </div>
                    <div class="item-content">
                        <?= $result_details['detail_explanation'] ?>
                    </div>
                    <div class="item-price">
                        <?= $result_details['detail_Price'] ?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </main>
    <script>
        window.onload = function() {
            const spinner = document.getElementById('load');
            spinner.classList.add('loaded');
        }
    </script>
</body>

</html>