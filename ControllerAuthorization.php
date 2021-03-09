<?php


class controllerAuthorization
{
    public function index()
    {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            require_once 'connectionDB.php';
            require_once 'ModelAuthorization.php';
            $new = new ModelAuthorization($_POST['email'], $_POST['password'], $mysql);
            if ($new->checkData()) {
                header('Location: success_auth.php');
            } else {
                unset($_SESSION['email']);
                unset($_SESSION['password']);
                header('Location: index.php');
            }
        }
    }
}