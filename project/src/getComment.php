<?php

function getComment(int $id)
{
    try {
        $id = mysqli_real_escape_string(dbConnection(), $id);
        $sql = 'SELECT com.text FROM client AS c INNER JOIN comment_client AS cc ON cc.client_id  = c.id INNER JOIN comments AS com ON cc.comment_id = com.id where c.id = ' . $id;
        $result = mysqli_query(dbConnection(), $sql);
        return mysqli_fetch_all($result);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}