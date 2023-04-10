<?php
class DAO{
    private function dbConnect(){
        $pdo = new PDO('mysql:host=localhost;dbname=kaihatsu;charset=utf8','webuser','abccsd2');
        return $pdo;
    }

    // 新規登録時にユーザ情報を登録する
    public function insertUser($mail,$pass,$name,$birthday,$gender,$job){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO user(mail,pass,name,birthday,gender,job)
                VALUES(?,?,?,?,?,?)";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$mail,PDO::PARAM_STR);
        $ps->bindValue(2,$pass,PDO::PARAM_STR);
        $ps->bindValue(3,$name,PDO::PARAM_STR);
        $ps->bindValue(4,$birthday,PDO::PARAM_STR);
        $ps->bindValue(5,$gender,PDO::PARAM_STR);
        $ps->bindValue(6,$job,PDO::PARAM_STR);

        $ps->execute();
    }

    //ログイン時にメールアドレスとパスワードから該当ユーザを検索する
    public function loginUser($mail,$pass){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM user WHERE mail = ? AND pass = ?";
        $ps = $pdo ->prepare($sql);
        $ps -> bindValue(1,$mail,PDO::PARAM_STR);
        $ps -> bindValue(2,$pass,PDO::PARAM_STR);
        $ps -> execute();
        $searchArray = $ps->fetchAll();
        return $searchArray;
    }

    //カテゴリ情報を全権検索する
    public function post1(){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM category";
        $searchArray = $pdo -> query($sql);
        return $searchArray;
    }

    //選択されたカテゴリのidをもとにサブカテゴリ情報を検索する
    public function post2($category){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM category_sub WHERE category_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps ->bindValue(1,$category,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps ->fetchAll();
        return $searchArray;
    }

    //投稿された不満の内容をDBに登録する
    public function post3($user_id,$human,$kaizen,$level,$category,$sub_category,$kigyou,$tenpo,$shohin){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO post(user_id,category_id,category_sub_id,content,improvement,level,company,store,product,absence)
                VALUES(?,?,?,?,?,?,?,?,?,?)";

        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$user_id,PDO::PARAM_INT);
        $ps->bindValue(2,$category,PDO::PARAM_STR);
        $ps->bindValue(3,$sub_category,PDO::PARAM_STR);
        $ps->bindValue(4,$human,PDO::PARAM_STR);
        $ps->bindValue(5,$kaizen,PDO::PARAM_STR);
        $ps->bindValue(6,$level,PDO::PARAM_INT);
        $ps->bindValue(7,$kigyou,PDO::PARAM_STR);
        $ps->bindValue(8,$tenpo,PDO::PARAM_STR);
        $ps->bindValue(9,$shohin,PDO::PARAM_STR);
        $ps->bindValue(10,0,PDO::PARAM_INT);

        $ps->execute();
    }

    //カテゴリ名前を受け取ってカテゴリIDを表示するための処理
    public function id($sub){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM category_sub WHERE category_sub_name = ?";
        $ps = $pdo -> prepare($sql);
        $ps ->bindValue(1,$sub,PDO::PARAM_STR);
        $ps -> execute();
        $searchArray = $ps ->fetchAll();
        return $searchArray;
    }

    //投稿時刻の降順にユーザ自身が投稿した不満を全件検索する
    public function my_human($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM post WHERE user_id = ? ORDER BY post_time DESC";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    
    public function human_count($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT COUNT(*) FROM post WHERE user_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function human(){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM post ORDER BY post_time DESC";
        $searchArray = $pdo -> query($sql);
        return $searchArray;
    }

    public function human_name($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM user WHERE user_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function main_change($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM category WHERE category_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function sub_change($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM category_sub WHERE category_sub_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function trade(){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM exchange_gift_list";
        $searchArray = $pdo -> query($sql);
        return $searchArray;
    }

    public function gift_amo($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT * FROM exchange_gift_list WHERE gift_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function noget($id){
            $pdo = $this -> dbConnect();
            $sql = "SELECT * FROM post WHERE absence = ? and user_id = ?";
            $ps = $pdo -> prepare($sql);
            $ps -> bindValue(1,0,PDO::PARAM_INT);
            $ps -> bindValue(2,$id,PDO::PARAM_INT);
            $ps -> execute();
            $searchArray = $ps -> fetchAll();
            return $searchArray;
    }

    public function get($post,$user,$rand){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO get_history(post_id,user_id,get_amo)
                VALUES(?,?,?)";
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$post,PDO::PARAM_INT);
        $ps->bindValue(2,$user,PDO::PARAM_INT);
        $ps->bindValue(3,$rand,PDO::PARAM_INT);

        $ps->execute();
    }

    public function update($id){
        $pdo = $this -> dbConnect();
        $sql = "UPDATE post SET absence = ? WHERE user_id = ? AND absence = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,1,PDO::PARAM_INT);
        $ps -> bindValue(2,$id,PDO::PARAM_STR);
        $ps -> bindValue(3,0,PDO::PARAM_INT);
        $ps -> execute();
    }

    public function ex_after($user,$gift,$amo){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO exchange_request(user_id,gift_id,ex_chanpo_amo)
                VALUES(?,?,?)";
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$user,PDO::PARAM_INT);
        $ps->bindValue(2,$gift,PDO::PARAM_INT);
        $ps->bindValue(3,$amo,PDO::PARAM_INT);

        $ps->execute();
    }

    public function in_point($id){
        $pdo = $this -> dbConnect();
        $sql = "SELECT IF(COUNT(*)<>?,sum(get_amo),?) AS in_point FROM get_history WHERE user_id = ?";
        $ps = $pdo -> prepare($sql);
        $ps -> bindValue(1,0,PDO::PARAM_INT);
        $ps -> bindValue(2,0,PDO::PARAM_INT);
        $ps -> bindValue(3,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps -> fetchAll();
        return $searchArray;
    }

    public function out_point($id){
        $pdo = $this -> dbConnect();
            $sql = "SELECT IF(COUNT(*)<>?,sum(ex_chanpo_amo),?) AS out_point FROM exchange_request WHERE user_id = ?";
            $ps = $pdo -> prepare($sql);
            $ps -> bindValue(1,0,PDO::PARAM_INT);
            $ps -> bindValue(2,0,PDO::PARAM_INT);
            $ps -> bindValue(3,$id,PDO::PARAM_INT);
            $ps -> execute();
            $searchArray = $ps -> fetchAll();
            return $searchArray;
        }


    public function post_change($id,$forehead){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO point_history(user_id,change_cause,change_forehead)
                VALUES(?,?,?)";
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$id,PDO::PARAM_INT);
        $ps->bindValue(2,"　不満投稿　",PDO::PARAM_STR);
        $ps->bindValue(3,$forehead,PDO::PARAM_INT);
        $ps->execute();
    }

    public function point_change($id,$forehead){
        $pdo = $this->dbConnect();
        $sql = "INSERT INTO point_history(user_id,change_cause,change_forehead)
                VALUES(?,?,?)";
        $ps = $pdo->prepare($sql);

        $ps->bindValue(1,$id,PDO::PARAM_INT);
        $ps->bindValue(2,"ポイント交換",PDO::PARAM_STR);
        $ps->bindValue(3,$forehead,PDO::PARAM_INT);

        $ps->execute();
    }

    public function point_history($id){
        $pdo = $this->dbConnect();
        $sql = "SELECT * FROM point_history WHERE user_id = ? ORDER BY change_time DESC";
        $ps = $pdo -> prepare($sql);
        $ps ->bindValue(1,$id,PDO::PARAM_INT);
        $ps -> execute();
        $searchArray = $ps ->fetchAll();
        return $searchArray;
    }
}