
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
    <form action="./complete.php" method="post">
        <h1>お問い合わせフォーム</h1>
        <p>以下のフォームからお問い合わせ下さい。</p>
        タイトル　（必須） <input type="text" name="title" placeholder="タイトル"><br>
        Email　（必須）　<input type="email" name="email" placeholder="Email アドレス"><br>
        お問い合わせ内容　（必須）<br>
        <textarea cols="100" rows="10" maxlength="1000"  name="message" placeholder="お問い合わせ内容（1000文字まで）をお書き下さい。"></textarea><br>
        <input type="submit" name="send" value="送信" />
    </form>
</body>
</html>
