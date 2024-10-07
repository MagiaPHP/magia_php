<form method="post" action="index.php" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_user_block">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">

    <button type="submit" class="btn btn-danger"><?php echo _t("Yes, block the user now"); ?></button>

</form>