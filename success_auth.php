<?php
require_once 'header.php';
require_once 'ControllerAuthorization.php';
require_once 'ControllerGetAccess.php';
$new = new ControllerAuthorization();
echo $new->index();
?>
<?php if (!empty($_SESSION['email'])) { ?>
    <div class="content-accesses">
    <div class="content-item">
        <h1>Add MyACCESSES</h1>
        <form action="check_access.php" method="post" name="form_auth">
            <div class="lab-form">
                <label>Заголовок</label>
                <input type="text" name="title" required="required">
            </div>
            <div class="lab-form">
                <label>Название проекта</label>
                <input type="text" name="title_project" required="required">
            </div>
            <div class="lab-form">
                <label>Описание</label>
                <textarea type="text" name="description" required="required"></textarea>
            </div>
            <div class="btn">
                <input type="submit" name="btn_submit" value="Добавить">
            </div>
        </form>
    </div>
<?php } else { ?>
    <div class="error-access"><h1>Ваш аккаунт создан!</h1></div><a href="authorization.php">
        <div class="error-access">Пожалуйста авторизуйтесь...
    </a></div>
<?php } ?>
<div class="content-item project">
    <?php
    $new2 = new ControllerGetAccess();
    echo $new2->index();
    ?>
</div>
</div>
<?php
require_once 'footer.php';
?>
