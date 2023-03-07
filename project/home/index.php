<?php
include "../src/core.php";
if (!isAuth()) {
    header('Location: /');
}
$add = false;
$addError = false;
$addSucces = false;
$clientId = [];
$addOwnTask = false;
$user = getUser($_SESSION['id']);
$clients = filter(getClient(($_SESSION['id'] % 2) == 0 ? 'odd' : 'even'));
foreach ($clients as $client) {
    $clientId[] = $client[0];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id']) && !empty($_POST['comment'])) {
    if (in_array($_POST['id'], $clientId)) {
        $addOwnTask = false;
        $addComment = addComment($_POST['id'], $_POST['comment']);
        $addError = true;
        if ($addComment) {
            $addError = false;
            $addSucces = true;
        }
    } else {
        $addOwnTask = true;
    }
}
?>

<?php echo renderTemplate('includes/header.php', array('title' => 'Личный кабинет')); ?>
<div>
    <h1 class="title mb-3">Личный кабинет | <?= $user[0][1] ?? 'Undefined' ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Имя</th>
            <th scope="col">Фамилия</th>
            <th scope="col">Телефон</th>
            <th scope="col">Почта</th>
            <th scope="col">Комментарии</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($clients as $client) { ?>
            <tr>
                <th scope="row"><?= $client[0] ?? 'Undefined' ?></th>
                <td><?= $client[1] ?? 'Undefined' ?></td>
                <td><?= $client[2] ?? 'Undefined' ?></td>
                <td><?= $client[3] ?? 'Undefined' ?></td>
                <td><?= $client[4] ?? 'Undefined' ?></td>
                <?php if (count(getComment((int)$client[0]))) { ?>
                    <td>
                        <div>
                            <?php foreach (getComment((int)$client[0]) as $comment) { ?>
                                <p>
                                    <?= $comment[0] ?>
                                </p>
                            <?php } ?>
                        </div>
                    </td>
                <?php } else { ?>
                    <td><?= 'Нет комментариев' ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <form action="home/" method="post">
        <?php if ($addSucces) { ?>
            <div class="alert alert-success" role="alert">
                Комментарий добавлен!
            </div>
        <?php } ?>
        <?php if ($addError) { ?>
            <div class="alert alert-danger" role="alert">
                Комментарий не добавлен!
            </div>
        <?php } ?>
        <?php if ($addOwnTask) { ?>
            <div class="alert alert-danger" role="alert">
                Комментарий может быть добавлен только к вашим заявкам!
            </div>
        <?php } ?>
        <div class="mb-3">
            <label for="id" class="form-label">ID Клиента</label>
            <input type="number" required name="id" class="form-control" id="id" placeholder="ID Клиента">
        </div>
        <div class="mb-3">
            <label for="comment" class="form-label">Комментарий</label>
            <textarea type="text" required name="comment" class="form-control" id="comment"
                      placeholder="Комментарий"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Добавить комментарий">
    </form>
</div>
<?php echo renderTemplate('includes/footer.php'); ?>
