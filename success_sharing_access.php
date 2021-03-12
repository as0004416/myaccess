<?php
require_once 'header.php';
require_once 'ControllerSharingAccess.php';
$new = new ControllerSharingAccess();
echo $new->getAccess();
require_once  'footer.php';