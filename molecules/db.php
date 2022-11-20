<?php
    //connect DB
    function dbConnect() {
        $sdn = 'mysql:host=localhost;dbname=store_app;charset=utf8';
        $user = 'veg_user';
        $pass = 'vegpass';
        //check connect
        try{
            $dbh = new PDO($sdn,$user,$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch(PDOException $e) {
            echo '接続失敗'. $e->getMessage();
            exit();
        };

        return $dbh;
    }
    //get data
    function getMenu() {
        $dbh = dbConnect();
        //preparation SQL
        $sql = "SELECT * FROM menu_table WHERE category = '" . $_POST['category'] . "'";
        //execution SQL
        $stmt = $dbh->query($sql);
        //receive result SQL
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
?>