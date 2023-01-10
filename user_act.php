<?php

//1. POSTデータ取得
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

//2. DB接続します
try {
    //ID:'root', Password: xamppは 空白 ''
    $pdo = new PDO('mysql:dbname=profile;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {                    //接続失敗したらエラーキャッチしてください
    exit('DBConnectError:'.$e->getMessage());    //エラーを表示する
  }

//３．データ登録SQL作成
// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO user_table(id,name,lid,lpw)
                       VALUES(NULL, :name,:lid,:lpw)");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);//送られて来た値を一回処理してから入力
$stmt->bindValue(':lid', $lid,PDO::PARAM_STR);
$stmt->bindValue(':lpw',$lpw,PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:'.$error[2]);
  }else{
    //５．成功したらselect.phpへ遷移
     header('Location:index.php'); 
   
  }
  ?>
