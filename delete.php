<?php
//1. POSTデータ取得

$id = $_GET['id'];

//2. DB接続します
try {
    $pdo = new PDO('mysql:dbname=profile;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit('データベースに接続できませんでした。'.$e->getMessage());
  }

  //３．データ登録SQL作成
  $sql = 'DELETE FROM stars_table WHERE id=:id';
$stmt = $pdo->prepare($sql);//prepareメソッドに渡す
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();//実行する

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
