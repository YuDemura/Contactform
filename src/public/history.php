<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>送信履歴</h1>

<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=contactform; charset=utf8", $dbUserName, $dbPassword);

$sql = "select * from contacts";
$statement = $pdo->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    echo $row["title"] . "<br>";
    echo $row["content"] . "<br>";
}
?>

        <a href="index.php">戻る</a>
</body>
</html>
