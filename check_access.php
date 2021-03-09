<?php
require_once 'header.php';
require_once 'ControllerMyAccess.php';
$new_my_access = new ControllerMyAccess();
echo $new_my_access->index();
?>