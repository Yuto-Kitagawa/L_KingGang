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
    let myname = <?= "\"" .$_SESSION['me'] . "\"" ?>;
    // セッションの格納
    window.sessionStorage.setItem(['me'],[myname]);
  </script>
  <script src="chat.js"></script>

</html>