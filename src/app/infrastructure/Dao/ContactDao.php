<?php
namespace App\Infrastructure\Dao;

require_once __DIR__ . '/../../../vendor/autoload.php';

use PDO;
/**
 * お問い合わせ情報を操作するDAO
 */
final class ContactDao extends Dao
{
    /**
     * お問い合わせ情報を保存する。
     * @param string $title
     * @param string $email
     * @param string $content
     */
    public function submitForm(string $title, string $email, string $content): void
    {
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
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':email', $email, PDO::PARAM_STR);
    $statement->bindValue(':content', $content, PDO::PARAM_STR);
    $statement->execute();
    }

    /**
     * お問い合わせ内容全件取得
     *
     */
    public function makeHistory()
    {
        $sql = <<<EOF
            SELECT * FROM
                contacts
            ;
        EOF;
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $contacts;
    }
}
