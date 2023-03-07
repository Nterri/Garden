<?php

function getUser(int $id)
{
    try {
        $id = mysqli_real_escape_string(dbConnection(), $id);
        $sql = "SELECT * FROM manager WHERE id = {$id}";
        $result = mysqli_query(dbConnection(), $sql);
        return mysqli_fetch_all($result);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}