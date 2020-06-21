<?php
//1.  DB接続します
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError'.$e->getMessage());
}

//２．POST値取得（POST数に合わせて増やす）
$name = $_POST["name"];
$name = $_POST["lid"];
$name = $_POST["lpw"];
$name = $_POST["kanri_flg"];
$name = $_POST["life_flg"];


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "INSERT INTO gs_user_table(name,lid,lpw,kanri_flg,life_flg)VALUES(:name, :lid, :lpw, :kanri_flg, :life_flg, sysdate())";
$stmt = $pdo->prepare($sql);

//４．SQL文の値へPOST値を渡す//*の箇所を変更！！
//（POST数に合わせて増やす）
$stmt->bindValue(":name", $name);
$stmt->bindValue(":lid", $lid);
$stmt->bindValue(":lpw", $lpw);
$stmt->bindValue(":kanri_flg", $kanri_frg);
$stmt->bindValue(":life_flg", $life_flg);


//5. SQL実行
$stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    header("Location: users_select.php");
    exit();
    
}


?>