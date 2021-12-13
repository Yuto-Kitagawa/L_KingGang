<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">ホーム</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="post.html">投稿</a>
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

    <main>
        <div class="w-100">
            <div class="d-flex justify-content-around">
                <div class="m-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/login_photo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">とまと</h5>
                            <p class="card-text">取れたてのトマトに・ゆゆゆゆでたてのパスタに・ふふふふれっしゅなオリーブ・いかがですか
                            </p>
                            <a href="./post_detail.php" class="btn btn-dark">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/login_photo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">とまと</h5>
                            <p class="card-text">取れたてのトマトに・ゆゆゆゆでたてのパスタに・ふふふふれっしゅなオリーブ・いかがですか
                            </p>
                            <a href="./post_detail.php" class="btn btn-dark">詳細</a>
                        </div>
                    </div>
                </div>
                <div class="m-3">
                    <div class="card" style="width: 18rem;">
                        <img src="../img/login_photo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">とまと</h5>
                            <p class="card-text">取れたてのトマトに・ゆゆゆゆでたてのパスタに・ふふふふれっしゅなオリーブ・いかがですか
                            </p>
                            <a href="./post_detail.php" class="btn btn-dark">詳細</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        window.onload = function () {
            const spinner = document.getElementById('load');
            spinner.classList.add('loaded');

        }
    </script>
</body>

</html>