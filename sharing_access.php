<?php
require_once 'header.php';
require_once 'ControllerSharingAccess.php';
$new = new ControllerSharingAccess();?>
<div class="success_sharing_access">
<form action='success_sharing_access.php' method='POST' name='users-access'>
    <div class="column-access">
    <?php echo $new->index();?>
    </div>
    <div class="btn-access"><input type="submit" name="formSubmit" value="Обменяться" /></div>
</form>
</div>
<?php
require_once 'footer.php';
?>
