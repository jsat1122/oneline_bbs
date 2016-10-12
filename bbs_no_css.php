<?php
  // ここにDBに登録する処理を記述する

  // １．データベースに接続する
  $dsn = 'mysql:dbname=oneline_bbs;host=localhost';
  $user = 'root';
  $password='';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

 // POSTでデータが送信された時のみSQLを実行する
  if (!empty($_POST)) {
    $nickname = $_POST['nickname'];
    $comment = $_POST['comment'];

  // ２．SQL文を実行する(INSERT文)
  $sql = "INSERT INTO `posts`(`id`, `nickname`, `comment`, `created`) VALUES (null,'".$nickname."','".$comment."',now())";
  $stmt = $dbh->prepare($sql);
  $stmt->execute();  

}

  // ３．データベースを切断する
  $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
    <form method="post" action="">
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->



</body>
</html>