<?php
$errors = [];
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    $errors[] = 'post送信になっていません！';
}

$title = filter_input(INPUT_POST, 'title');
$email = filter_input(INPUT_POST, 'email');
$content = filter_input(INPUT_POST, 'content');
if (empty($title)) {
    $errors[] =
        '「タイトル」が記入されていません！';
}
if (empty($email)) {
    $errors[] =
        '「Email」が記入されていません！';
}
if (empty($content)) {
    $errors[] =
        '「お問い合わせ内容」が記入されていません！';
}

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=contactform; charset=utf8',
    $dbUserName,
    $dbPassword
);

$sql = <<<EOF
  insert into
    `contacts`(`title`, `email`, `content`) VALUES (:title, :email, :content)
  ;
EOF;

$statement = $pdo->prepare($sql);
$statement->bindValue(':title', $title, PDO::PARAM_STR);
$statement->bindValue(':email', $email, PDO::PARAM_STR);
$statement->bindValue(':content', $content, PDO::PARAM_STR);
$statement->execute();

if (empty($errors)) {
    $message = '送信完了！！！';
    $links = '
      <a href="./index.php">
        <p>送信画面へ</p>
      </a>
      <a href="./history.php">
        <p>送信履歴をみる</p>
      </a>';
} else {
    $links = '
        <a href="./index.php">
          <p>送信画面へ</p>
        </a>
      ';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <title>送信完了画面</title>
</head>

<body>
  <div>
    <?php if (!empty($errors)): ?>
      <?php foreach ($errors as $error): ?>
        <p><?php echo $error . "\n"; ?></p>
      <?php endforeach; ?>
      <?php echo $links; ?>
    <?php endif; ?>

    <?php if (empty($errors)): ?>
      <?php
      echo '<h2>' . $message . '</h2>';
      echo $links;
      ?>
    <?php endif; ?>
  </div>
</body>

</html>
