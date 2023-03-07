<?php
include "./src/core.php";
$addTask = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['phone']) && !empty($_POST['email'])) {
    $addTask = addTask($_POST['name'], $_POST['surname'], $_POST['phone'], $_POST['email']);
}
?>

<?php echo renderTemplate('includes/header.php', array('title' => 'Главная страница')); ?>
<div>
    <h1 class="title mb-3">Оставьте заявку</h1>
    <form action="index.php" method="post">
        <?php if ($addTask) { ?>
            <div class="alert alert-success" role="alert">
                Заявка отправлена!
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" required name="name" class="form-control" id="name" placeholder="Иван">
        </div>
        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" required name="surname" class="form-control" id="surname" placeholder="Иванов">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Телефон</label>
            <input class="form-control" id="phone" name="phone" type="tel" maxlength="50" required
                   pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                   placeholder="+79999999999">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" required name="email" class="form-control" id="email" placeholder="ivanov@ivan.ru">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
<?php echo renderTemplate('includes/footer.php'); ?>
