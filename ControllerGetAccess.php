<?php


class ControllerGetAccess
{
    public function index()
    {
        if (!empty($_SESSION['email'])) {
            require_once 'connectionDB.php';
            require_once 'ModelGetAccess.php';
            $new = new ModelGetAccess($mysql, $_SESSION['email']);
            echo $new->getFromBD();
        }
    }
}