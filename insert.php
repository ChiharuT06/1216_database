<?php

/**
 * 1. index.phpのフォームの部分がおかしいので、ここを書き換えて、
 * insert.phpにPOSTでデータが飛ぶようにしてください。
 * 2. insert.phpで値を受け取ってください。
 * 3. 受け取ったデータをバインド変数に与えてください。
 * 4. index.phpフォームに書き込み、送信を行ってみて、実際にPhpMyAdminを確認してみてください！
 */

//1. POSTデータ取得
$date = $_POST['date'];
$level = $_POST['level'];
$content = $_POST['content'];



//2. DB接続します
try {
  //ID:'root', Password: xamppは 空白 ''
  $pdo = new PDO('mysql:dbname=profile;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {                    //接続失敗したらエラーキャッチしてください
  exit('DBConnectError:'.$e->getMessage());    //エラーを表示する
}
//↑ここは決まり文句


//３．データ登録SQL作成

// 1. SQL文を用意
$stmt = $pdo->prepare("INSERT INTO stars_table(id,date,text,level,indate)
                       VALUES(NULL, :date,:text,:level,sysdate())");
                       

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR

$stmt->bindValue(':date', $date, PDO::PARAM_STR);//送られて来た値を一回処理してから入力
$stmt->bindValue(':level', $level,PDO::PARAM_STR);
$stmt->bindValue(':text',$content,PDO::PARAM_STR);

//  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit('ErrorMessage:'.$error[2]);
}else{
  //５．成功したらselect.phpへ遷移
   header('Location:select.php'); 
 
}
?>
