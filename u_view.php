<?php
//1.GETでid値を取得
$id = $_GET["id"];
echo $id;
exit;

//2.DB接続など
 try {
   $pdo = new PDO('mysql:dbname=profile;charset=utf8;host=localhost','root','');
 } catch (PDOException $e) {
   exit('データベースに接続できませんでした。'.$e->getMessage());
 }


//3.
$sql = "SELECT * FROM stars_table WHERE id=id";
$stmt = $pdo->prepare($sql);//prepareメソッドに渡す
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute();//実行する



//4.データ表示
$view="";
if($status==false) {
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

} else {
  //１データのみ抽出の場合はwhileループで取り出さない
  $row = $stmt->fetch();

}
?>



<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
                <legend>今日はどんな１日だった？</legend>
                <label>日付<input type="date" name="date" value="<?=$row["date"]?>"></label><br>
                <label>ひとこと<textArea name="content"  rows="4" cols="40"><?=$row["content"]?></textArea></label><br>
                <label>星の数
                  <select name="level" value="<?=$row["level"]?>">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                  </select>
                </label><br>
                <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>