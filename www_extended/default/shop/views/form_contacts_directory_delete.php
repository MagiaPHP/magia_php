<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_directory_delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $directory_list_by_contact_id['contact_id']; ?>">
    <input type="hidden" name="name" value="<?php echo $directory_list_by_contact_id['name']; ?>">
    <input type="hidden" name="data" value="<?php echo $directory_list_by_contact_id['data']; ?>">




    <button type="submit" class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span>
        <?php _t("Delete"); ?></button>

</form>
