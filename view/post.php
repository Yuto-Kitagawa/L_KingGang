<?php
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
        #pic-label {
            padding: 20px;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 100px;
        }

        #pic-label2 {
            padding: 20px;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 100px;
        }

        #pic-label3 {
            padding: 20px;
            background-color: rgb(0, 0, 0);
            color: white;
            border: none;
            border-radius: 100px;
        }

        input#pic2 {
            display: none;
        }

        input#pic3 {
            display: none;
        }

        .preview {
            border: 1px solid black;
            width: 15vw;
            max-width: 15vw;
            max-height: 15vw;
            height: 15vw;
        }

        .preview img {
            width: 15vw !important;
        }

        .form-control:focus {
            border-color: #6d6d6d;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(90, 90, 90, 0.6);
        }
    </style>
</head>

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
                            <li><a class="dropdown-item" href="#">投稿履歴</a></li>
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
        <div class="content w-100 mb-5">
            <div class="w-100 text-center input-wrapper mb-5">
                <h2 class="text-center w-100 my-3">投稿</h2>
                <form action="../actions/post.php" method="POST" enctype="multipart/form-data">
                    <div class="d-flex justify-content-around align-items-center w-75 m-auto mb-5" style="height: 35vh;">
                        <input id="pic1" type="file" name="pic1" class="d-none" onChange="imgPreView(event, 'preview1','pic1')">
                        <label for="pic1" class="pic1 btn btn-outline-primary">写真を選択</label>
                        <div id="preview1" class="d-none" style="width: 20vw;height:20vw;"></div>
                        <input id="pic2" type="file" name="pic2" class="d-none" onChange=" imgPreView(event, 'preview2' ,'pic2')">
                        <label for="pic2" class="pic2 btn btn-outline-primary">写真を選択</label>
                        <div id="preview2" class="d-none" style="width: 20vw;height:20vw;"></div>
                        <input id="pic3" type="file" name="pic3" class="d-none" onChange=" imgPreView(event, 'preview3','pic3')">
                        <label for="pic3" class="pic3 btn btn-outline-primary">写真を選択</label>
                        <div id="preview3" class="d-none" style="width: 20vw;height:20vw;"></div>
                    </div>

                    <div class="input-title-wrapper m-4">
                        <input class="p-2 w-25 m-auto form-control" type="text" name="title" id="" placeholder="タイトル　*必須" required><br>
                    </div>
                    <div class="input-explain-wrapper m-4">
                        <input class="p-2 w-25 m-auto form-control" type="text" name="content" id="" placeholder="説明  最大255文字" required><br>
                    </div>
                    <div class="input-price-wrapper m-4">
                        <input class="p-2 w-25 m-auto mb-3 form-control" type="number" name="price" id="" placeholder="値段(円)　*必須" required>
                    </div>

                    <div class="input-season-wrapper p-2 m-4">
                        <select class="form-select w-25 m-auto" name="season" aria-label="Default select example">
                            <option selected value="">季節を選択</option>
                            <option value="1">春</option>
                            <option value="2">夏</option>
                            <option value="3">秋</option>
                            <option value="4">冬</option>
                        </select>
                    </div>

                    <div class="input-cate-wrapper p-2 m-4">
                        <select class="form-select w-25 m-auto" name="category" aria-label="Default select example">
                            <option selected value="">カテゴリーを選択</option>
                            <option value="1">家電</option>
                            <option value="2">家具</option>
                            <option value="3">インテリア</option>
                            <option value="4">服</option>
                            <option value="5">スポーツ用品</option>
                        </select>
                    </div>
                    <div class="input-addr-wrapper m-4">
                        <input class="form-control p-2 w-25 m-auto" type="text" name="location" id="address" placeholder="渡す場所 *必須" required>
                    </div>
                    <button class="btn btn-outline-dark" type="submit">
                        投稿する
                    </button>
                </form>
            </div>
        </div>
    </main>

    <!-- 写真のアイコンを選択した時に表示するスクリプト -->
    <script>
        function imgPreView(event, targetId, deletebtn) {
            var file = event.target.files[0];
            console.log(file);
            var reader = new FileReader();
            var preview = document.getElementById(targetId);
            preview.classList.remove('d-none');
            var d = document.getElementsByClassName(deletebtn)[0];
            d.classList.add('d-none');
            console.log(preview);
            var previewImage = document.getElementById("previewImage-" + targetId);

            if (previewImage != null) {
                preview.removeChild(previewImage);
            }

            reader.onload = function(event) {
                var img = document.createElement("img");
                img.style = "object-fit:contain;";
                img.setAttribute("width", "100%");
                img.setAttribute("height", "100%");
                img.setAttribute("src", reader.result);
                img.setAttribute("id", "previewImage-" + targetId);
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        }
    </script>
    <script src="./dropdown.js"></script>
</body>

</html>