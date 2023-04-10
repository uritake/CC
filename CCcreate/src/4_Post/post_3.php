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
<body>
    <?php 
    require "../DAO.php";
    $dao = new DAO();
    session_start();
    
    /* 先ほどセッションに保存した投稿情報をDBに保存する処理
       DBに保存後の破棄はしてないので不具合が出る可能性あり */

    $insert_post = $dao -> post3($_SESSION['id'],
                                 $_SESSION['user']['human'],
                                 $_SESSION['user']['kaizen'],
                                 $_SESSION['user']['level'],
                                 $_SESSION['user']['category'],
                                 $_SESSION['user']['subcategory'],
                                 $_SESSION['user']['kigyou'],
                                 $_SESSION['user']['tenpo'],
                                 $_SESSION['user']['shohin'],
                                );
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
            <div  class = "col-9" >   
            <div style="text-align:center;margin-top:20%;">
                <h1>不満の投稿を完了しました！<br>審査が完了し次第ポイントが付与されます</h1>
            </div>
            <form action = "../3_Mypage/mypage.php" method = "post">
                <div style="text-align:center;margin-top:10%;">
                <div class = "button0" >
                    <button type='submit' onmouseover="this.style.background=''" onmouseout="this.style.background=''">マイページ画面へ</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>