<?php

function auth($login, $password)
{
    try {
        $login = mysqli_real_escape_string(dbConnection(), $login);
        $password = mysqli_real_escape_string(dbConnection(), $password);
        $sql = 'SELECT * FROM manager';
        $result = mysqli_query(dbConnection(), $sql);
        if ($result) {
            foreach (mysqli_fetch_all($result) as $user) {
                if ($user[1] == $login && password_verify($password, $user[2])) {
                    $_SESSION['id'] = $user[0];
                    return true;
                }
            }
        }
        return false;
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}