<?php
require_once 'header.php';
require_once 'ControllerRegistration.php';
$new = new ControllerRegistration();
echo $new->index();
require_once  'footer.php';