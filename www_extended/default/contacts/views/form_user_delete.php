
<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_user_delete">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="login"><?php _t("Write the user login here"); ?> /  <b><?php echo users_field_contact_id('login', $id); ?></b> </label>
        <input type="email" class="form-control" id="login" name="login" placeholder="user@mail.com" required="">
    </div>


    <div class="checkbox">
        <label>
            <input type="checkbox" name="i_want" required=""> <?php _t('Yes, I want to erase it'); ?>
        </label>
    </div>

    <button type="submit" class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span>
        <?php echo _tr("Delete"); ?>
    </button>

</form>