<?php
$url = explode('?', $_SERVER['REQUEST_URI'])[0];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<style>
    .wrapper {
        margin: 15px 0;
    }
</style>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light container">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php foreach (getNavbar() as $nav) { ?>
                        <li class="nav-item">
                            <a class="<?= $nav['url'] == $url ? 'nav-link active' : 'nav-link' ?>"
                               href="<?= $nav['url'] ?>"><?= $nav['name'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
