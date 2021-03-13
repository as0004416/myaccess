<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Название нашего сайта</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="header" id="header">
    <div class="logo">
        <?php if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) { ?>
            <h2>MyACCESS</h2>
        <?php } else { ?>
            <a href="success_auth.php"><h2>MyACCESS</h2></a>
            <p><?php echo '<div class="usertext_email"><span>Вход выполнен: </span><span class="user_email">'.$_SESSION['email'].'</span></div>'; ?></p>
        <?php }
        ?>
    </div>
    <div><a class="auth" href="/index.php">Главная</a></div>
    <div class="auth_block" id="auth_block">
        <?php
        if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
            ?>
            <div id="link_register">
                <a class="auth" href="registration.php">Регистрация</a>
            </div>

            <div id="link_auth">
                <a class="auth" href="authorization.php">Авторизация</a>
            </div>
            <?php
        } else {
            ?>
            <div id="link_logout">
                <a class="auth" href="/logout.php">Выход</a>
                <a class="auth" href="sharing_access.php">Обмен доступами</a>
            </div>
            <?php
        }
        ?>
    </div>
    <div class="clear"></div>
</div>