// セッションの値の取得
var me = window.sessionStorage.getItem(['me']);

// データベースと接続する
var messagesRef = new Firebase("https://kinggang-b1f59-default-rtdb.firebaseio.com/");

var messageField = $('#messageInput');
var messageList = $('#messages');
//受け取る人のIDを取得
var you = $('#tousername');

var sendbtn = $('#sendMessageBtn');

sendbtn.click(() => {
  sendMessage();
})

messageField.keypress(() => {
  sendMessage();
});

function sendMessage(e) {
  //フォームに入力された情報
  var username = me;
  var message = messageField.val();
  var toUser = you.text();

  //データベースに保存する
  messagesRef.push({ name: username, text: message, touser: toUser });
  messageField.val('');

  $('#scroller').scrollTop($('#messages').height());
}

// データベースにデータが追加されたときに発動する
messagesRef.limitToLast(10).on('child_added', function (snapshot) {
  //取得したデータ
  var data = snapshot.val();

  if ((data.name == me && data.touser == you.text()) || (data.touser == me && data.name == you.text())) {

    var username = data.name;
    var message = data.text;

    //取得したデータの名前が自分の名前なら右側に吹き出しを出す
    if (username == me) {
      var messageElement = $("<il><p class='sender_name me'>" + username + "</p><p class='right_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
    } else {
      var messageElement = $("<il><p class='sender_name'>" + username + "</p><p class='left_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
    }
    //HTMLに取得したデータを追加する
    messageList.append(messageElement)

    //一番下にスクロールする
    messageList[0].scrollTop = messageList[0].scrollHeight;
  }
});
