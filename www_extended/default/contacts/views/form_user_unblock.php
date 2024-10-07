<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_user_unblock">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label for="new"><?php _t("Unblock User"); ?></label>
        <p><?php _t("You will give access the sistem to this user, do you unblock the user now?"); ?></p>
    </div>

    <button type="submit" class="btn btn-primary"><?php echo _t("Yes, give access now"); ?></button>

</form>



.