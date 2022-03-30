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
        <table>
            <tr>
                <td>タイトル（必須）</td>
                <td><input type="text" name="title" placeholder="タイトル" /></td>
            </tr>
            <tr>
                <td>Email（必須）</td>
                <td><input type="email" name="email" placeholder="Emailアドレス" /></td>
            </tr>
            <tr>
                <td>お問い合わせ内容（必須）</td>
                <td><textarea cols="100" rows="10" maxlength="1000" name="content" placeholder="お問い合わせ内容（1000文字まで）お書き下さい。"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="button">送信</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
