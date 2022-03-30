<?php
$dbUserName = "root";
$dbPassword = "password";
$pdo = new PDO("mysql:host=mysql; dbname=contactform; charset=utf8", $dbUserName, $dbPassword);

$sql = "select * from contacts";
$statement = $pdo->prepare($sql);
$statement->execute();
$contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>送信履歴</title>
</head>

<body>
    <div>
        <h2>送信履歴</h2>
        <?php foreach ($contacts as $contact) : ?>
            <h3><?php echo $contact['title'] ?></h3>
            <p><?php echo $contact['content'] ?></p>
        <?php endforeach; ?>
        <a href="./index.php">戻る</a>
    </div>
</body>

</html>
