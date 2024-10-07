<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_user_block">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">
    <button type="submit" class="btn btn-primary"><?php echo _t("Yes, block the user now"); ?></button>

</form>