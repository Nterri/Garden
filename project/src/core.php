<?php

include "renderTemplate.php";
include "dbConnection.php";
include "addTask.php";
include "isAuth.php";
include "auth.php";
include "getUser.php";
include "getClient.php";
include "getComment.php";
include "addComment.php";
include "filter.php";
include "getNavbar.php";

dbConnection();
session_start();
