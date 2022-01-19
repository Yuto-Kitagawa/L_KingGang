<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQueryのURLです。多分使っているので消さないでください。日付などの処理は別でコード下に書いていますが、jQueryは使っていません。 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- アイコン用のURLです。商用利用はOKです。アイコンはサイトでコードをコピーして使えます -->
    <!-- https://kit.fontawesome.com -->
    <script src="https://kit.fontawesome.com/f3d03e8132.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>

<body>
    <main>
        <ul>
            <li></li>
        </ul>
    </main>


    <script type="module">
        // Import the functions you need from the SDKs you need
        import {
            initializeApp
        } from "https://www.gstatic.com/firebasejs/9.6.3/firebase-app.js";

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
        const rel = initializeApp(firebaseConfig);
        

    </script>


</body>

</html>