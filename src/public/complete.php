<?php
session_start();
$title = $_POST['title'];
$email = $_POST['email'];
$message = $_POST['message'];

$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=contactform; charset=utf8", $dbUserName, $dbPassword);

$sql = "insert into contacts(title, email, content) VALUES(:title, :email, :content)";
$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->bindValue(':content', $message, PDO::PARAM_STR);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>送信完了！！！</h1><br>
    <a href="index.php">送信画面へ</a><br>
    <a href="history.php">送信履歴を見る</a>
</body>
</html>
