<?php


class controllerRegistration
{
    public function index()
    {
        if (!empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            require_once 'connectionDB.php';
            require_once 'ModelRegistration.php';
            $new = new ModelRegistration($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $mysql);
            if ($new->index()) {
                return '<div class="error-access"><h1>Ваш аккаунт создан!</h1></div><a href="authorization.php"><div class="error-access">Пожалуйста авторизуйтесь...</a></div>';
            } else {
                return '<div class="error-access"><h1>' . $new->errorOutput() . '</h1></div><a href="registration.php"><div class="error-access">Вернуться к регистрации!</a></div>';
            }
        }
    }
}