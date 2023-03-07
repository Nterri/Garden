<?php
include "../src/core.php";
$isAuth = false;
$auth = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['login']) && !empty($_POST['password'])) {
    $isAuth = true;
    $auth = auth($_POST['login'], $_POST['password']);
    if ($auth) {
        $isAuth = false;
        $_SESSION['isAuth'] = $auth;
    }
}
if (isAuth()) {
    header('Location: /home');
}
?>

<?php echo renderTemplate('includes/header.php', array('title' => 'Авторизация')); ?>
<div>
    <h1 class="title mb-3">Авторизация</h1>
    <form action="manager/" method="post">
        <?php if ($isAuth) { ?>
            <div class="alert alert-danger" role="alert">
                Неправильный логин или пароль!
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="login" class="form-label">Логин</label>
            <input type="text" required name="login" class="form-control" id="login" placeholder="Логин">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" required name="password" class="form-control" id="password" placeholder="Пароль">
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
</div>
<?php echo renderTemplate('includes/footer.php'); ?>
