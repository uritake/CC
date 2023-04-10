<!DOCTYPE html>
<html style="margin:0;padding:0;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"/>
    <title>新規登録完了画面</title>
</head>
<body style="background-color:;">
<form action="../2_Login/login.php" method="post"> 

<!--  パンくずリストバックアップ
    
<div style="display:flex;margin-top:2%">
        <div style="margin-left:20%;">➀会員情報の登録</div>
        <div style="margin-left:15%;">➁入力内容の確認</div>
        <div style="margin-left:15%;margin-right:5%;">➂登録完了</div>
    </div>
-->
<div style="text-align:center;
    margin-top:15%;">
    <h1>アカウントの登録が完了しました！</h1>
    <h1>不満を書き込んでポイントをGETしましょう！</h1>
</div>
<div class = "button0">
    <div style="text-align:center;margin-top:10%;">
    <button type='submit' onmouseover="this.style.background=''" onmouseout="this.style.background=''">ログイン画面へ</button>
    </div>
</div>
</form>
    
<?php
session_start();

require '../DAO.php';
$dao = new DAO();
$new = $dao->insertUser($_SESSION['user']['mail'],$_SESSION['user']['pass'],$_SESSION['user']['name'],$_SESSION['user']['birth'],$_SESSION['user']['meal'],$_SESSION['user']['job']);
?>
