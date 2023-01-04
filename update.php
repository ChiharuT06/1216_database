<?php

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$date = $_POST['date'];
$level = $_POST['level'];
$content = $_POST['content'];
$id = $_POST['id'];

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=profile;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {                    //接続失敗したらエラーキャッチしてください
    exit('DBConnectError:'.$e->getMessage());    //エラーを表示する
  }
  //↑ここは決まり文句


//３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM stars_table;");
$status = $stmt->execute();

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: select.php');
    exit();
}

