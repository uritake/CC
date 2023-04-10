<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Document</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body style = "background-color:azure">
    <?php
    require '../DAO.php';
    $dao = new DAO();
    session_start();

    $_SESSION["trade_id"] = $_POST["botton"];

    ?>
    <div class = "container-fluid">
        <div class = "row">

            <!-- サイドメニュー　-->
            <div class = "col-3">
                <div id = "nav">
                    <ul class = sub>
                        <div class = sub_box>

                        <a href="../3_Mypage/mypage.php">
                            マイページ<br>
                        </a>
                        <a href="../4_Post/post_1.php">
                            投稿する<br>
                        </a>
                        <a href="../5_Human/human.php">
                            投稿を覗く<br>
                        </a>
                        <a href="../6_Point/point_select.php">
                            チャンポ交換<br>
                        </a>
                        <a href="../logout.php">
                            ログアウト<br>
                        </a>
                            <br>
                        </div>
                    </ul>
                </div>
            </div>

            <!-- メイン　-->
            <div class = "col-9" >
                <form action="?" method="post">

                <br><br>
                <div style = "margin-left:150px">
                <?php
                //交換するチャンポ額をデータベースで調べて受け取る処理(多分前ページの処理を変えれば省略可)
                $gift_amo  = $dao ->  gift_amo($_SESSION["trade_id"]);

                //完了画面でポイント交換履歴に登録するため、交換するチャンポ額をセッションに保存
                $_SESSION["treade_amo"] = $gift_amo[0]["required_chanpo"];
                
                //画面に表示するために交換後の残りチャンポ数を算出
                $kekka = $_SESSION["point"] - $gift_amo[0]["required_chanpo"];
                ?>

                <?php

                //交換後の残りチャンポ数が0より低い場合、メッセージを変更
                if($kekka >= 0){
                    echo '<h2>以下の内容でチャンポを交換しますか？</h2>';
                }else{ 
                    echo '<h2 style = "position:relative; left:10%;"> ポイントが不足しています</h2>';
                }
                ?>
                </div>
                <br><br>
                
                <!-- 交換時の保有チャンポの変動を表示する -->
                <div class = "pointbox2" style = "width:600px; margin-left:150px;"> 
                <div class = "field">
                    <h3 style =  "margin:40px">保有チャンポ　　</h3>
                    <h3 style = "margin-top:40px; margin-left:90px"><font color = "#77F492"><?php echo $_SESSION["point"] .'pt';?></font></h3>
                </div>
                <div class = "field">
                    <h3 style = "margin-left:40px">交換するチャンポ</h3>
                    <h3 style = "margin-left:130px">
                    <font color = "#F53971">
                    <?php 
                    echo $_SESSION["treade_amo"] .'pt' ;
                    ?>
                    </font>
                </h3>
            </div>
            <hr class="hr1">
            <div class = "field">
                <h3 style = "margin:40px">交換後の保有チャンポ</h3>
                <h3 style = "margin-top:40px; margin-left:60px">
       
                <?php
                if($kekka >= 0){
                    echo '<font color = "#77F492">'. $kekka .'pt';
                }else{
                    echo '<font color = "#F53971">'. $kekka .'pt';
                }
                ?></h3>
                </div>
            </div>
            <br><br>
            <div class = "button0" >

                <!-- 交換後の保有チャンポが0未満の場合は完了画面へ遷移するボタンを出さない -->
                <?php
                if($kekka >= 0){
                    echo   '<br>
                            <div class = "field">
                            <button type="submit" formaction="point_select.php" style = "position:relative; left:-3%; ";>選択画面へ戻る</button>
                            <button type="submit" formaction="point_ok.php"  style = "position:relative; left:-16%; ";>チャンポを交換する</button>
                            </div>';            
                }else{ 
                    echo '<br><button type="submit" formaction="point_select.php" style = "position:relative; left:-10%; width:100%">選択画面へ戻る</button></br>';
                }
                ?>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>