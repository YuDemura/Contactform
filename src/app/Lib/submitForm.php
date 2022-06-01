<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function submitForm(string $title, string $email, string $content): void
{
    $pdo = pdoInit();

    $sql = <<<EOF
        INSERT INTO
            contacts
            (title
            , email
            , content)
        VALUES
            (:title
            , :email
            , :content)
        ;
    EOF;
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();
}
