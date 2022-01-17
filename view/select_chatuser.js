// セッションの値の取得
var me = window.sessionStorage.getItem(['me']);
// データベースと接続する
var messagesRef = new Firebase("https://kinggang-b1f59-default-rtdb.firebaseio.com/");
// データベースにデータが追加されたときに発動する
messagesRef.limitToLast(10).on('child_added', function (snapshot) {

    //取得したデータ
    var data = snapshot.val();
    if (data.name == me) {

        var username = data.name;
        var message = data.text;

        //取得したデータの名前が自分の名前なら右側に吹き出しを出す
        if (username == me) {
            var messageElement = $("<il><p class='sender_name me'>" + username + "</p><p class='right_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
        } else {
            var messageElement = $("<il><p class='sender_name'>" + username + "</p><p class='left_balloon'>" + message + "</p><p class='clear_balloon'></p></il>");
        }

        console.log(data);
    }
});
