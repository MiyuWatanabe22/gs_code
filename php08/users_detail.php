<?php
//(8回目授業＝課題)
//１．PHP
//[users_select.php]のPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
$_GET["id"];

try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBError:'.$e->getMessage());
}

$sql = "SELECT * FROM gs_user_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":id",$id);
$status = $stmt->execute();

$view=""; 
if($status==false) {
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    $res = $stmt->fetch();
    $res["id"] $res["email"]
}




?>
<!--
２．HTML
以下に[users.html]のHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="users_update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>アンケート登録</title>
</head>
<body>
<!--  ＊＊＊の個所を変更  -->
<form method="post" action="users_update.php">
<p>お名前:<input type="text" name="name" size="20" value="<?=$res["name"]?>"></p>
<p>MAIL:<input type="text"  name="email" size="20" value="<?=$res["email"]?>"></p>
<p>年齢:<input type="text"  name="age" size="4" value="<?=$res["age"]?>"></p>
<p>内容：<textarea rows="3"  name="naiyou" cols="30"><?=$res["naiyou"]?></textarea></p>
<p><input type="hidden" name="id" value="<?=$id>">
<p><input type="submit" value="送信"></p>
</form>
</body>
</html>


