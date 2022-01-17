<?php

session_start();
$_SESSION['me'] = "kitagawa";

?>

<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <script src="https://cdn.firebase.com/js/client/2.3.2/firebase.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="chat.css">
</head>

<body>

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
  <div class="panel-default">
    <div class="panel-heading">
      <p id="tousername"></p>
    </div>
    <div id="scroller" class="panel-body">
      <ul id='messages'>
      </ul>
    </div>
    <div class="panel-footer">
      <input type='text' class="form-control" id="messageInput" placeholder="メッセージ内容を入力してください">
      <input type="submit" id="sendMessageBtn">
    </div>
  </div>
</body>
<script>
  let myname = <?= "\"" . $_SESSION['me'] . "\"" ?>;
  // セッションの格納
  window.sessionStorage.setItem(['me'], [myname]);
</script>
<script src="chat.js"></script>

</html>