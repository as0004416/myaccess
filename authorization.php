<?php
require_once("header.php");
?>

<div class="block_for_messages">

</div>

<?php

if (!isset($_SESSION["email"]) && !isset($_SESSION["password"])) {
    ?>
    <div id="form_auth">
        <h2>Форма авторизации</h2>
        <form action="success_auth.php" method="post" name="form_auth">
            <div>
                <div class="lab-form">
                    <label>Email:</label>
                    <input type="email" name="email" required="required"><br>
                    <span id="valid_email_message" class="mesage_error"></span>
                </div>
            </div>
            <div>
                <div class="lab-form">
                    <label>Пароль:</label>
                    <input type="password" name="password" placeholder="минимум 7 символов" required="required"><br>
                    <span id="valid_password_message" class="mesage_error"></span>
                </div>
            </div>
            <div class="btn">
                <input type="submit" name="btn_submit_auth" value="Войти">
            </div>
        </form>
    </div>

    <?php
} else {
    ?>
    <div id="authorized">
        <h2>Вы уже авторизованы</h2>
    </div>
    <?php
}
?>
<?php
//Подключение подвала
require_once("footer.php");
?>

