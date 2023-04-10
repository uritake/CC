<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>新規登録確認情報画面</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../css/style.css"/>
</head>
    <body>

<br><br>

    <?php
    require '../DAO.php';

    $dao = new DAO();
    session_start();

 //　ユーザ情報をセッション関数に登録　//
    $_SESSION['user'] =
    ['mail' => $_POST['mail'],
     'pass' => $_POST['pass'],
     'name' => $_POST['name'],
     'birth' => $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'],
     'meal' => $_POST['meal'],
     'job' => $_POST['job']];
    ?>
    <form action = "?" method = "post">

     <!--   パンくずリストバックアップ

        <div style="display:flex;margin-top:2%">
            <div style="margin-left:20%;">➀会員情報の登録</div>

            <div style="margin-left:15%;">➁入力内容の確認</div>

            <div style="margin-left:15%;margin-right:5%;">➂登録完了</div>

        </div>
-->
<h3 style="text-align:center">以下の内容で登録を完了しますか？</h3>
        <div name="maindiv" class="container"></div>
        </div>
        <div style="margin-left:32%;margin-top:5%">
        <div class = "row">
            <div class = "col-4">
                <h4 style="margin-top:5%">メールアドレス</h4>
            </div>
            <div class = "col-8">
                <?php
                 echo '<h4>'. $_POST['mail'] .'</h4>';
                ?>
        </div>
        </div> 
        <div class = "row">
            <div class = "col-4">
                <h4 style="margin-top:5%">パスワード</h4>
            </div>
            <div class = "col-8">
            <?php
                 echo '<h4>'. $_POST['pass'] .'</h4>';
            ?>
        </div>
        </div>
        <div class = "row">
            <div class = "col-4">
        <h4 style="margin-top:5%">ニックネーム</h4>
            </div>
            <div class = "col-8">
            <?php
                 echo '<h4>'. $_POST['name'] .'</h4>';
            ?>
        </div>
        </div>
        <div class = "row">
            <div class = "col-4">
        <h4 style="margin-top:5%">生年月日</h4>
        </div>
            <div class = "col-8">
            <?php
                 echo '<h4>'. $_POST['year'] .'年'. $_POST['month'] .'月'. $_POST['day'] . '日</h4>';
            ?>
        </div>
        </div>
        <div class = "row">
            <div class = "col-4">
        <h4 style="margin-top:5%">性別</h4>
        </div>
            <div class = "col-8">
            <?php
                 echo '<h4>'. $_POST['meal'] .'</h4>';
            ?>
        </div>
        </div>
        <div class = "row">
            <div class = "col-4">
        <h4 style="margin-top:5%">職業</h4>
        </div>
            <div class = "col-8">
            <?php
                 echo '<h4>'. $_POST['job'] .'</h4>';
            ?>
        </div>
        </div>
        </div>
        <div class = "button0">
        <div style="display:flex;margin-top:3%;">
            <div style="margin-left:34%;">
            <button type='submit' formaction="acnt_1.php" onmouseover="this.style.background=''" onmouseout="this.style.background=''">修正する</button>
            </div>
            <div style="margin-left:15%;">
            <button type='submit' formaction="acnt_3(usually).php" onmouseover="this.style.background=''" onmouseout="this.style.background=''">登録する</button>
            </div>
</div>
        </div>
    </body>
</html>