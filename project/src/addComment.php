<?php

function addComment(int $id, string $text)
{
    try {
        if ($id < 0) return false;
        $id = mysqli_real_escape_string(dbConnection(), $id);
        $text = mysqli_real_escape_string(dbConnection(), $text);
        $sql = "INSERT INTO comments (text) VALUES (\"{$text}\")";
        $resultComment = mysqli_query(dbConnection(), $sql);
        $idComment = mysqli_real_escape_string(dbConnection(), mysqli_insert_id(dbConnection()));
        $sql = "INSERT INTO comment_client (client_id, comment_id) VALUES (\"{$id}\", \"{$idComment}\")";
        $resultRelation = mysqli_query(dbConnection(), $sql);
        return $resultComment && $resultRelation;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}