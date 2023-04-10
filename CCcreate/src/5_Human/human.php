<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="../css/style.css"/>

    <title>Document</title>    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body style = "background-color:azure">


    <?php
    require '../DAO.php';
    $dao = new DAO();
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
            <div class = "col-9" >
            <br><br><br>
            <?php

            //現在投稿されている不満をDBから全件検索する処理
            $human = $dao -> human();
            foreach($human as $allhuman){

                //カテゴリID、サブカテゴリID、ユーザIDを使ってカテゴリ名、サブカテゴリ名、ニックネームを取得する処理

                $main_change = $dao -> main_change($allhuman["category_id"]);
                $sub_change = $dao -> sub_change($allhuman["category_sub_id"]);
                $human_name = $dao -> human_name($allhuman["user_id"]);
                
                echo 
                '<div class = "box2"> 
                <h2 style = "text-align:left">'.$main_change[0]["category_name"].'</h2>
                <h3 style = "text-align:left">'.$sub_change[0]["category_sub_name"].'</h2><br>
                <h4 style = "text-align:left">'.$allhuman["content"].'</h2>
                <h4 style = "text-align:left">'.$allhuman["improvement"].'</h2>
                <br>

                <h4 style = "text-align:left">'.$human_name[0]["name"].'
                </div> <br>';
            }
            ?>

            <script src="../scr/script.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
        </body>
</html>