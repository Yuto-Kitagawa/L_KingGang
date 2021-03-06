<?php
include "../class/function.php";
$id = $_GET['id'];

$func = new Functions;

$item = $func->getItems($id)->fetch_assoc();
$detail = $func->getDetail($id)->fetch_assoc();
session_start();
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
    <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
    <title></title>
    <style>
        .price {
            font-weight: 1px;
            font-size: 2em;
        }

        .line-marker-b::after {
            content: "";
            display: block;
            width: 0;
            animation: line-marker-b 2s forwards ease-in-out;
            border-bottom: 1px solid #f00;
        }

        @keyframes line-marker-b {
            0% {
                width: 0%;
            }

            100% {
                width: 100%;
            }
        }

        .form-control:focus {
            border-color: #6d6d6d;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(90, 90, 90, 0.6);
        }

        @media screen and (max-width:970px) {
            .explain-wrapper {
                display: flex;
                flex-direction: column-reverse;
                width: 100%;
            }
        }

        @media screen and (min-width:971px) {
            .explain-wrapper {
                width: 50%;
            }

            .pic-wrapper {
                width: 50% !important;
            }
        }
    </style>
</head>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">??????</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">??????</button>
                <a href="../actions/buy.php" class="btn btn-danger">??????????????????????????????</a>
            </div>
        </div>
    </div>
</div>

<body>
    <!-- ??????????????????????????????????????? -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="./home.php">??????????????????</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./home.php">?????????</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="./post.php">??????</a>
                        </li>
                        <!-- ????????????????????????????????? -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['username'] ?></a>
                            <ul id="menu-bar" class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#profile">??????????????????</a></li>
                                <li><a class="dropdown-item" href="#">????????????</a></li>
                                <li><a class="dropdown-item" href="./posted.php">????????????</a></li>
                                <li><a class="dropdown-item" href="../actions/logout.php">???????????????</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-center align-items-center">
                        <?php
                        if (!isset($_SESSION['id'])) { ?>
                            <?php
                            ?>
                            <li class="nav-item list-unstyled ">
                                <a class="nav-link active text-dark" aria-current="page" href="login.html">????????????</a>
                            </li>
                            <li class="nav-item list-unstyled ">
                                <a class="nav-link active text-dark" aria-current="page" href="createUser.html">????????????</a>
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

    <div class="w-100">
        <div class="explain-wrapper d-flex w-100 h-100">
            <div class="h-100 col-12 col-lg-6" style="border-right: 1px black solid;">
                <div class="d-flex mx-5 align-items-center my-3">
                    <div class="title display-6 text-center"><?= $item['post_Name'] ?></div>
                    <div class="price lead text-center m-auto " style="width: fit-content;">???<?= $detail['detail_Price'] ?></div>
                </div>
                <hr class="w-75 m-auto  my-5">
                <div class="explain lead px-5"><?= $detail['detail_explanation'] ?></div>
                <hr class="w-75 m-auto my-5">
                <div class="d-flex align-items-center my-3 justify-content-evenly">
                    <div class="lead">????????????: </div>
                    <div class="address lead"><?= $detail['detail_Location'] ?></div>
                </div>
                <hr class="w-75 m-auto my-5">
                <div class="d-flex align-items-center my-3 justify-content-evenly">
                    <div class="lead">?????????: </div>
                    <div class="address lead">
                        <?php $userID = $item['user_Id'];
                        $userName_array = $func->getProfile($userID);
                        $userName = $userName_array->fetch_assoc();
                        echo $userName['user_Name'];
                        ?></div>
                </div>
                <div class="w-100 text-center my-5"> </div>
                <div class="d-flex justify-content-around">
                    <a href="../actions/chat.php?postid=<?= $item['post_No'] ?>" class="btn btn-outline-primary w-25">??????</a>
                    <button type="button" class="w-25 btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ??????
                    </button>
                </div>
            </div>
            <div class="pic-wrapper h-100 text-center col-12 col-lg-6">
                <img src="../img/<?= $detail['detail_Image1'] ?>" height="100%" width="100%" style="object-fit: cover;" alt="">
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            const price = document.getElementsByClassName('price')[0];
            price.classList.add('line-marker-b')
        }
    </script>

</body>


</html>