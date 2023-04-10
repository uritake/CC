<!DOCTYPE html>
<html style="margin:0;padding:0;" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>投稿登録完了画面</title>
    <link rel="stylesheet" href="../css/style.css"/>
</head>
<body style = "background-color:azure">
    <?php
    require '../DAO.php';
    $dao = new DAO();
    session_start();

    $ex_after = $dao -> ex_after($_SESSION["id"],$_SESSION["trade_id"],$_SESSION["treade_amo"]);
    $point_change = $dao -> point_change($_SESSION['id'],$_SESSION["treade_amo"]);

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
            <div  class = "col-9" >
                <div style="display:flex;margin-top:2%">
                </div>
            <div style="text-align:center;margin-top:20%;">
            <h1>ポイントの交換を完了しました。<br></h1>
            </div>
            <form action = "../3_Mypage/mypage.php" method = "post">
                <div style="text-align:center;margin-top:10%;">
                <div class = "button0" >
                    <button type='submit' onmouseover="this.style.background=''" onmouseout="this.style.background=''">マイページ画面へ</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>