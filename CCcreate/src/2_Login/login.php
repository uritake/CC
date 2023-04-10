<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Document</title>    
</head>
<body bgcolor = #A4DCED>
<?php
session_start();
if(isset($_SESSION["mail"]) == true && isset($_SESSION["name"]) == true){
    header('Location: ../3_Mypage/mypage.php');
}
?>

<form action="login_check.php" method="post">
    <br><br><br><br>
    <article>
    <div style="text-align: center">

    <h2 class="test">メールアドレスとパスワードを入力してください</h2><br>
    <input type="text" name="mail" style="width:300px; height:25px" placeholder="メールアドレス"><br><br>
    <input type="password" name="pass" size="40" style="width: 300px; height:25px" placeholder="パスワード"><br>

    <?php
    if(TRUE != empty($_POST["error"])){ 
    '<p class="error">メールアドレス、パスワードが未入力、または誤りがあります。<br>
       正しいメールアドレス・パスワードを入力してください</p>';
    }
    ?>
    <br>
    <p>アカウントを作成していない方</p>
    <a href="../1_Create_acount/acnt_1.php">アカウントを新規登録</a>
    <div class = "button0">
    <br>
    <button type = "submit">ログイン</button>
    </div>
</div>
</form>
</body>
<script>
