<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_banks_delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="account_number" value="<?php echo $banks_list_by_contact_id['account_number']; ?>">
    <input type="hidden" name="redi" value="1">

    <button type="submit" class="btn btn-danger"><?php _t("Delete"); ?></button>
</form>
