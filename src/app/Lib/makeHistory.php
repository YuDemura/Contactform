<?php
require_once(__DIR__ . '/../Lib/pdoInit.php');

function makeHistory()
{
    $pdo = pdoInit();

    $sql = <<<EOF
        SELECT * FROM
            contacts
        ;
    EOF;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $contacts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
}
