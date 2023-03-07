<?php

function getClient(string $type = 'odd')
{
    try {
        if ($type == 'odd') {
            $sql = "SELECT * FROM client where (id % 2) != 0";
            $result = mysqli_query(dbConnection(), $sql);
            return mysqli_fetch_all($result);
        }
        if ($type == 'even') {
            $sql = "SELECT * FROM client where (id % 2) = 0";
            $result = mysqli_query(dbConnection(), $sql);
            return mysqli_fetch_all($result);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}