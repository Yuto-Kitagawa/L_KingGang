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

        @media screen and (max-width:926px) {
            .explain-wrapper {
                display: flex;
                flex-direction: column-reverse;
                width: 100%;
            }
        }

        @media screen and (min-width:927px) {
            .explain-wrapper {
                width: 50%;
            }

            .pic-wrapper {
                width: 50% !important;
            }
        }
    </style>
</head>

</html>

<body>
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
                        <a class="nav-link" href="post.php">投稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">設定</a>
                    </li>
                </ul>
                <form action="post_lists.html?item=" class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="w-100">
        <div class="explain-wrapper d-flex w-100 h-100">
            <div class="h-100" style="border-right: 1px black solid;">
                <div class="d-flex mx-5 align-items-center my-3">
                    <div class="title display-6 text-center">とまと</div>
                    <div class="price lead text-center m-auto " style="width: fit-content;">¥10000</div>
                </div>
                <div class="explain lead px-5">取れたてのトマトに・ゆゆゆゆでたてのパスタに・ふふふふれっしゅなオリーブ・いかがですか</div>
                <hr>
                <div class="d-flex align-items-center my-3 justify-content-evenly">
                    <div class="lead">取引先: </div>
                    <div class="address lead">大阪市北区中崎長1-2-3</div>
                </div>
                <div class="w-100 text-center my-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d209989.4496583871!2d135.34594990674734!3d34.67780033079795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6000e6553406e2e1%3A0xc55bc16ee46a2fe7!2z5aSn6Ziq5bqc5aSn6Ziq5biC!5e0!3m2!1sja!2sjp!4v1635145671609!5m2!1sja!2sjp" width="85%%" style="border:0;height: 40vh !important;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="w-100 text-center">
                    <a href="./chat.php" class="btn btn-outline-primary w-25">相談</a>
                </div>
            </div>
            <div class="pic-wrapper h-100 text-center">
                <img src="../img/login_photo.jpg" height="100%" width="100%" style="object-fit: cover;" alt="">
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