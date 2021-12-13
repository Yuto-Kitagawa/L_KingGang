<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- フォント用URLです。google fontは商用でも使えるらしいので、もし使われるのであればfamily=と&の間にその字体の名前を入れてください -->
  <link href="https://fonts.googleapis.com/css2?family=Sawarabi+Mincho&display=swap" rel="stylesheet">
  <!-- bootstrapのURLです。消さないでください -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  <!-- googlefontのURL。消すな -->
  <link href="https://fonts.googleapis.com/css2?family=Yuji+Mai&display=swap" rel="stylesheet">
  <!-- jQueryのURLです。多分使っているので消さないでください。日付などの処理は別でコード下に書いていますが、jQueryは使っていません。 -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- アイコン用のURLです。商用利用はOKです。アイコンはサイトでコードをコピーして使えます -->
  <!-- https://kit.fontawesome.com -->
  <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./index.css">
  <title></title>
</head>

<body>
  <!-- PC用画面 -->
  <div class="d-none d-sm-block">
    <!-- ナビゲーション -->
    <section>
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
    </section>

    <!-- header(カーセル) -->
    <section>
      <div class="w-100" style="height: 90vh;">
        <div id="carouselExampleControls" class="carousel carousel-dark slide h-100" data-bs-ride="carousel">
          <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
          </ol>
          <div class="carousel-inner w-100 h-100 m-auto">
            <div class="carousel-item active h-100" data-bs-interval="5000">
              <img src="../img/sale.jpg" class="d-block h-100  m-auto" style="object-fit:cover" alt="">
            </div>
            <div class="carousel-item h-100" data-bs-interval="5000">
              <img src="../img/sale2.jpg" class="d-block h-100 m-auto" style="object-fit:cover" alt="">
            </div>
            <div class="carousel-item h-100" data-bs-interval="5000">
              <img src="../img/sale3.jpg" class="d-block h-100 m-auto" style="object-fit:cover" alt="">
            </div>
          </div>
          <a class=" carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>
      </div>
    </section>



    <section id="main-content" class="">
      <nav id="navbar-example3" class="navbar navbar-light bg-light display-none justify-content-center align-items-center  position-fixed" style="left: 0;top:0;height:100vh;width:15vw;">
        <ul id="menu-fixed-side-nav" class="fixed-side-nav__menu p-0">
          <a class="nav-link my-1" href="#Homeappliances">家電</a>
          <a class="nav-link my-1" href="#furniture">家具</a>
          <a class="nav-link my-1" href="#interior">インテリア</a>
          <a class="nav-link my-1" href="#clothes">服</a>
          <a class="nav-link my-1" href="#sports">スポーツ用品</a>
        </ul>
      </nav>

      <div class="mx-5 flex-column" style="margin-left: 15vw !important;">
        <div class="p-5 w-100 d-flex flex-column">
          <div id="elec">
            <h3>
              <div id="Homeappliances" class="u-border-title-b pb-3">家電</div>
            </h3>
            <div class="x-scroll">
              <?php
              include "../class/function.php";
              $func = new Functions;
              $elec_array = $func->getElecProducts();
              while ($elec = $elec_array->fetch_assoc()) {
              ?>
                <div class=" col-3 col-lg-4 px-5 slide">
                  <a href="./post_detail.php"><img class="w-100 text-center" src="../img/<?= $elec['detail_Image1'] ?>" href="post_detail.phpno=<?= $elec['post_No'] ?>" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                    <p class="p-2 lead"><?= $elec['detail_explanation'] ?></p>
                  </a>
                </div>

              <?php
              }
              ?>
              <!-- <div class="w-25 px-5 slide">
                <a href="./post_detail.php"><img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真"></a>
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" href="#Home" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div> -->
            </div>
          </div>
          <hr>

          <div id="elec">
            <h3>
              <div id="furniture" class="u-border-title-b pb-3">家具</div>
            </h3>
            <div class="x-scroll">
              <div class="w-25 px-5 slide">
                <a href="#"><img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真"></a>
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
            </div>
          </div>
          <hr>

          <div id="elec">
            <h3>
              <div id="interior" class="u-border-title-b pb-3">インテリア</div>
            </h3>
            <div class="x-scroll">
              <div class="w-25 px-5 slide">
                <a href="#"><img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真"></a>
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
            </div>
          </div>
          <hr>
          <div id="elec">
            <h3>
              <div id="clothes" class="u-border-title-b pb-3">服</div>
            </h3>
            <div class="x-scroll">
              <div class="w-25 px-5 slide">
                <a href="#"><img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真"></a>
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
            </div>
          </div>
          <hr>
          <div id="elec">
            <h3>
              <div id="sports" class="u-border-title-b pb-3">スポーツ用品</div>
            </h3>
            <div class="x-scroll">
              <div class="w-25 px-5 slide">
                <a href="shohin.html"><img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真"></a>
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
              <div class="w-25 px-5 slide">
                <img class="w-100 text-center" src="../images/test1.jpg" width="150vw" height="150vh" style="object-fit:cover;" alt="ユーザーの写真">
                <p>------------------------------------</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <hr>
    </section>


    <!-- スマホ用画面 -->
    <div class="d-block d-sm-none"></div>

    <script>
      window.addEventListener('load', () => {
        window.addEventListener('scroll', (e) => {
          //スクロールしたpxを取得
          let scrollPosi = window.scrollY;
          if (scrollPosi > 600) {
            document.querySelector('#navbar-example3').classList.add('scroll-fadein');
            console.log('Added');
          } else {
            document.querySelector('#navbar-example3').classList.remove('scroll-fadein');
            console.log('Remove');
          }
        })
      })
    </script>
    <script src="./dropdown.js"></script>

</body>

</html>