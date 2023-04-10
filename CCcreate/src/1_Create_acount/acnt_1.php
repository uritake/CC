<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equir="content-type" charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../css/acnt_1.css">
<link rel="stylesheet" href="../css/style.css"/>
<title>新規登録画面</title>
</head>

<body>
<div class="blocktext">
<!--
<div style="display:flex;margin-top:2%">
<div class="acbox">
            <div style="margin-left:20%;">➀会員情報の登録</div>
</div>
            <div class="acbox">
            <div style="margin-left:15%;">➁入力内容の確認</div>
</div>
            <div class="acbox">
            <div style="margin-left:15%;margin-right:5%;">➂登録完了</div>
</div>
        </div>
-->
<br><br>
<h2>新規登録画面</h2>
<form action="?" method="post">
メールアドレス:<input type="text" name="mail"placeholder="メールアドレスを入力してください" style = "width:240px;" required>
<br><br>
パスワード:　　<input type="password" name="pass"placeholder="パスワードを入力してください" style = "width:240px;" required>
<br><br>
ニックネーム:　<input type="text" name="name"placeholder="ニックネームを入力してください" style = "width:240px;" required>
<br><br>
生年月日　　　
<select name="year" required>
<!-- <option value="" hidden>-</option> -->
<?php
$Date = date("Y");
for($i=1900;$i<$Date-3;$i++){
    // if($i == 1900){
    // echo '<option value="">-</option>';
    // }
    if($i == 2000){
       echo '<option value="2000" selected>2000</option>';
       continue;
    }
    echo '<option value = '."$i".'>'.$i.'</option>';
}
?>
</select>年


<select name="month" required>
<option value="" hidden>-</option>

<?php
for($j=1;$j<=12;$j++){
    echo '<option value="'.$j.'">'.$j.'</option>';
}
?>
</select>月


<select name="day" required>
<option value="" hidden>-</option>

<?php
for($k=1;$k<=31;$k++){
    echo '<option value="'.$k.'">'.$k.'</option>';
}
?>

</select>日<br><br>
性別　　　　　
<input type= "radio"name="meal" value="男性" required>男性
<input type= "radio"name="meal" value="女性" required>女性
<input type= "radio"name="meal" value="無回答" required>無回答<br><br>

    職業　　　　　
    <select name="job" required>
    <option value="" hidden>職業を選択してください</option>
    <option value="会社員">会社員</option>
    <option value="学生">学生</option>
    <option value="主婦">主婦 </option>
    <option value="公務員">公務員</option>
</select>
<br><br>
<div class="invalid-feedback">
</div><br>
<div class = "button0">
<div class = "field">
<button onclick=  "location.href = '../2_Login/login.php'" style = "left: -80%; margin-right: -50%">ログイン画面へ戻る</button>
<button type = "submit" formaction="acnt_2.php" style = "left: -65%; margin-right: -50%" >確認画面へ進む</button>
</div>
</div>
</form>
</p>
</div>
</body>
</html>