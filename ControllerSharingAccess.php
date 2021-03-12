<?php


class ControllerSharingAccess
{
    public function index()
    {
        if (!empty($_SESSION['email'])) {
            require_once 'connectionDB.php';
            require_once 'ModelSharingAccess.php';
            $new = new ModelSharingAccess($mysql, $_SESSION['email']); ?>
                <div class='users-list'><div class="users-list-header"><h2>Доступные пользователи</h2></div><div class="users-list-item"><?php $new->getUserFromBD() ?></div></div>
            <div class='access-list'><div class="access-list-header"><h2>Ваши доступы</h2></div><div class="access-list-item"><?php $new->getAccessFromBD() ?></div></div>
            <?php
        }
    }
    public function getAccess(){
        if(!empty($_SESSION['email'])&&!empty($_POST['user_list'])&&!empty($_POST['access_list'])){
            require_once 'connectionDB.php';
            require_once 'ModelSharingAccess.php';
            $new2 = new ModelSharingAccess($mysql, $_SESSION['email']);
            $new2->getArray();
        }else{
            header('Location: sharing_access.php');
        }
    }
}