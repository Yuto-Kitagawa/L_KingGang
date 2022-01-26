<?php
include "../class/function.php";
session_start();
$postid = $_GET['postid'];
$func = new Functions;
$you_array = $func->getUser($postid);
$you = $you_array['user_Name'];
$mes = $_SESSION['id'];
$me_array = $func->getUserFomUser($mes);
$me = $me_array['user_Name'];
$roomid = $postid . $me . $you;

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


  <!-- ナビゲーション -->

  <section>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
                  <li><a class="dropdown-item" href="posted.php">投稿履歴</a></li>
                  <li><a class="dropdown-item" href="../actions/logout.php">ログアウト</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="chatList.php">トーク</a>
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


  <main>
    <div class="talk-wrapper col-8 col-lg-8" id="talk" style="margin: 10vh auto;"></div>
  </main>

  <div class="col-8 col-lg-6 m-auto fixed-bottom mb-3">
    <div class="panel-footer d-flex">

      <input type="text" class="form-control me-2" id="messageInput" placeholder="メッセージ内容を入力してください">
      <input type="submit" class="btn btn-primary" id="messageSendBtn">
    </div>
  </div>

  <script src="https://www.gstatic.com/firebasejs/3.6.3/firebase.js"></script>
  <script type="module">
    // Import the functions you need from the SDKs you need
    import {
      initializeApp
    } from "https://www.gstatic.com/firebasejs/9.6.3/firebase-app.js";
    import {
      getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.6.3/firebase-analytics.js";

    import {
      getDatabase
    } from "https://www.gstatic.com/firebasejs/9.6.3/firebase-database.js";

    const firebaseConfig = {
      apiKey: "AIzaSyDEzZESrhy3MLVI4KNSoGTF0lRZSqZikKU",
      authDomain: "realtimedatabase-l-king-gang.firebaseapp.com",
      databaseURL: "https://realtimedatabase-l-king-gang-default-rtdb.firebaseio.com",
      projectId: "realtimedatabase-l-king-gang",
      storageBucket: "realtimedatabase-l-king-gang.appspot.com",
      messagingSenderId: "108110142074",
      appId: "1:108110142074:web:2efbc35caf27b78fe6f9c3",
      measurementId: "G-MV74KFKVHQ"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    firebase.initializeApp(firebaseConfig);

    var db = firebase.database();

    document.querySelector('#messageSendBtn').addEventListener('click', () => {
      var input_text = document.querySelector('#messageInput');

      <?php
      $now = microtime(false);
      $now_str = (string)$now;
      $now_str = str_replace(".", '', $now_str);
      $now_str = str_replace(" ", '', $now_str);
      ?>

      var messagesRef = firebase.database().ref('<?= $roomid ?>');
      messagesRef.child("<?= $now_str ?>").set({
        "text": input_text.value,
        "to": "<?= $me ?>"
      });

      input_text.value = "";
    });


    db.ref('<?= $roomid ?>').on("value", (data) => {
      if (data) {
        const rootList = data.val();
        const key = data.key;
        let timeList = [];
        // データオブジェクトを配列に変更する
        if (rootList != null) {
          Object.keys(rootList).forEach((val, key) => {
            rootList[val].id = val;
            console.log(timeList.includes(rootList[val].id));

            if (timeList.includes(rootList[val].id) == true) {
              //なんもせーへん
            } else {
              if (rootList[val]['to'] == "<?= $me ?>") {
                document.querySelector('#talk').innerHTML += "<div class='me w-100 text-end lead'>" + rootList[val]['text'] + "</div>";
                timeList.push(rootList[val].id);
              } else {
                document.querySelector('#talk').innerHTML += "<div class='you lead p-3'>" + rootList[val]['text'] + "</div>";
                timeList.push(rootList[val].id);
              }
            }
          })
          console.log(timeList);
        }

      }
    });
  </script>
</body>

</html>