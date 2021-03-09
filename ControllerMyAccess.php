<?php


class ControllerMyAccess
{
    public function index()
    {
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            require_once 'connectionDB.php';
            require_once 'ModelMyAccess.php';
            $new = new ModelMyAccess($_POST['title'], $_POST['title_project'], $_POST['description'], $mysql);
            if ($new->addAcсountBD()) {
                header('Location: success_auth.php');
            } else {
                header('Location: success_auth.php');
            }
        }
    }

}