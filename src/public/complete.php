<?php
require_once(__DIR__ . '/../app/Lib/appshowMessage.php');
require_once(__DIR__ . '/../app/Lib/submitForm.php');

$errors = [];
if ($_SERVER['REQUEST_METHOD'] != 'POST') {
  appendError("post送信になっていません！");
}

$title = filter_input(INPUT_POST, 'title');
$email = filter_input(INPUT_POST, 'email');
$content = filter_input(INPUT_POST, 'content');
if (empty($title)) {
  appendError("「タイトル」が記入されていません！");
}
if (empty($email)) {
  appendError("「Eメール」が記入されていません！");
}
if (empty($content)) {
  appendError("「お問い合わせ内容」が記入されていません！");
}

submitForm($title, $email, $content);

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
