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
    require "../DAO.php";
    $dao = new DAO();
    
    session_start();
    if(isset($_SESSION['mail'])==false || isset($_SESSION['pass'])==false){
        header('Location: ../2_Login/login.php');
    }
    
    $noget = $dao -> noget($_SESSION["id"]);

/*　疑似ポイント付与処理　*/
    if(isset($noget) == TRUE){
    foreach($noget as $row){
    
    $rand = rand(5,50);
    $get = $dao -> get($row["post_id"],$row["user_id"],$rand);
    $update = $dao -> update($row["user_id"]);
    $post_change = $dao -> post_change($_SESSION['id'],$rand);
    $point_history = $dao -> point_history($_SESSION['id']);
}
}

?>

    <div class="container-fluid">
        <div class = "row">
            <!-- サブメニュー　-->
            <div class = "col-3 ">
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
    <div style="text-align: center" class = "col-9" >
    <br><br><br><br><br><br>
    <div class="container_fluid">
        <div class="row">
            <div class = "col-4">
                <h1 class = "my_su">
                    <?php
                    $human_count = $dao -> human_count($_SESSION["id"]);
                    foreach($human_count as $row){
                    echo $row["COUNT(*)"];
                }
                ?>
                </h1>
                <h2>総投稿数</h2>
                </div>
                <div class = "col-4">
                    <h1 class = "my_su">
                        <?php 
                        $in_point = $dao -> in_point($_SESSION["id"]);
                        $out_point = $dao -> out_point($_SESSION["id"]);
                        $now_point = $in_point[0]["in_point"] - $out_point[0]["out_point"];
                        $_SESSION['point'] = $now_point;
                        echo $now_point;
                        ?>
                    </h1>
                        <h2>保有チャンポ</h2>
                    </div>
                        
                    <br><br><br><br><br><br><br><br><br><br><br>

                    <!-- 投稿履歴タブ　-->
                    <div class="area">
                        <input type="radio" name="tab_name" id="tab1" checked>
                        <label for="tab1" class="tab_class">投稿履歴</label>
                        <div class="content_class">
                        <?php
                        $my_human = $dao -> my_human($_SESSION["id"]);

                        if(TRUE != empty($my_human)){

                        foreach($my_human as $human){
                            $main_change = $dao -> main_change($human["category_id"]);
                            $sub_change = $dao -> sub_change($human["category_sub_id"]);

                            echo 
                            '<div class = "box"> 
                            <h2 style = "text-align:left">'.$main_change[0]["category_name"].'</h2>
                            <h3 style = "text-align:left">'.$sub_change[0]["category_sub_name"].'</h2><br>
                            <h4 style = "text-align:left">'.$human["content"].'</h2>
                            <h4 style = "text-align:left">'.$human["improvement"].'</h2>
                            </div><br>';
                            }

                            }else{
                                echo '<br><h2>投稿された不満はありません<h2>';
                            }
                            ?>
                            </div>

                            <!-- チャンポ履歴タブ　-->
                            <input type="radio" name="tab_name" id="tab2">
                            <label for="tab2" class="tab_class">チャンポ履歴</label>
                            <div class="content_class">
                            <?php
                            $point_history = $dao -> point_history($_SESSION['id']);
                            echo '<div class = change>';

                            if(TRUE != empty($my_human)){
                                foreach($point_history as $history){
                                   echo '<div class = "field">
                                   <h2>'.$history["change_cause"].'　　</font>'.
                                $history['change_time'].'　　';
                                if($history["change_cause"] == '　不満投稿　'){
                                    echo '<font color = "#77F492">'.$history['change_forehead'].'pt</font>';
                                }else{
                                    echo '<font color = "#F53971">'.$history['change_forehead'].'pt</font>';
                                }
                                'pt</h2>
                                </div><br>'
                                ;
                                }
                                echo '</div>';
                            }else{
                                echo '<br><h2>ポイントの変動はありません<h2>';
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>