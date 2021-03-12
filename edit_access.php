<?php
require_once 'header.php';
require_once 'ControllerGetAccess.php';
?>
<div class="content-edit">
    <?php if (!empty($_SESSION['email'])) { ?>
        <div class="content-item">
            <h1>Редактировать</h1>
            <form action="" method="post" name="form_edit_access">
                <div class="lab-form">
                    <label>Заголовок</label>
                    <input type="text" name="title">
                </div>
                <div class="lab-form">
                    <label>Название проекта</label>
                    <input type="text" name="title_project">
                </div>
                <div class="lab-form">
                    <label>Описание</label>
                    <textarea type="text" name="description"></textarea>
                </div>
                <div class="btn">
                    <input type="submit" name="btn_submit" value="Изменить">
                </div>
            </form>
        </div>
    <?php } else { ?>
        <a href="authorization.php">
            <div class="error-access">Пожалуйста авторизуйтесь...</div>
        </a>
    <?php } ?>
    <div class="content-item project">
        <?php
        $new = new ControllerGetAccess();
        $new->getAccess();
        ?>
    </div>
</div>
<?php
require_once 'footer.php';
?>
