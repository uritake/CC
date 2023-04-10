<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, content="height=device-height,initial-scale=1.0">
    <title>投稿情報確認画面</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css"/>
</head>
<body>
    <?php 
    require '../DAO.php';
    $dao = new DAO();
    session_start();
    
    // サブカテゴリの名前を使って、サブカテゴリテーブルから　カテゴリ、サブカテゴリID　を特定する
    $id = $dao -> id($_POST[$_POST["nmCategoryEntirety"]]);

    //完了画面で登録に使うので、一旦入力情報をセッションに保存

    $_SESSION['user'] = ['human' => $_POST["human"],
                        'kaizen' => $_POST["kaizen"],
                        'level' => $_POST["level"],
                        'category' => $id[0]["category_id"],
                        'subcategory' => $id[0]["category_sub_id"],
                        'kigyou' =>$_POST["kigyoumei"],
                        'tenpo' => $_POST["tenpo"],
                        'shohin' => $_POST["shohin"]];
    ?>
    <div class = "container-fluid">
        <div class = "row">

            <!-- サブメニュー　-->
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
            <div  class = "col-9">
                <form action="?" method="post">
                    <div style="margin-left:20%;margin-top:3%">
                    <h3 style="margin-top:5%">以下の内容で不満を投稿しますか？</h3>
                </div>
                <div style="margin-left:15%;">
                
                <!-- 任意項目が未入力の際に未入力と出ないので要修正　-->

                <?php
                echo '<h4>不満の内容<br></h4><h5>'.$_SESSION['user']['human'].
                '</h5><h4>
	            改善点</h4>';
                if(TRUE == isset($_SESSION['user']['kaizen'])){
                    echo $_POST["kaizen"].'<br>';
                }else{
                    echo '未入力<br>';
                }
                echo '<h4>不満レベル<br></h4><h5>'.
	            $_POST["level"].'</h5>
                <h4>カテゴリ<br></h4><h5>'.
	            $_POST["nmCategoryEntirety"].'</h5>'.
                '<h4>サブカテゴリ<br></h4><h5>'.
                $_POST[$_POST["nmCategoryEntirety"]].'
                </h5>
	            <h4>企業名<br></h4><h5>';
                if(TRUE == isset($_POST["kigyoumei"])){
                    echo $_POST["kigyoumei"].'</h5>';
                }else{
                    echo '未入力<br></h5>';
                }
	            echo '<h4>店舗・支店名<br></h4><h5>';
                if(TRUE == isset($_POST["tenpo"])){
                    echo $_POST["tenpo"].'</h5><br>';
                }else{
                    echo '未入力</h5>';
                }
                echo '<h4>商品・サービス名<br></h4><h5>';
                if(TRUE == isset($_POST["shohin"])){
                    echo $_POST["shohin"].'</h5><br>';
                }else{
                    echo '未入力</h5><br>';
                }
                ?>
                </div>
                <div style="display:flex;margin-top:3%;">
                <div class = "button0" >
                    <div class = row>
                        <div class = "col-6">
                            <div style="margin-left:80%; width: 200%">
                            <button type='submit' name="check"formaction="post_1.php">修正する</button>
                        </div>
                    </div>
                    <div class = "col-6">
                        <div style="margin-left:400%; width: 200%">
                        <button type='submit'name="check" formaction="post_3.php"  onmouseover="this.style.background=''" onmouseout="this.style.background=''">登録する</button>
                    </div>
                </div>
                <br><br>
            </div>
        </div>
    </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>