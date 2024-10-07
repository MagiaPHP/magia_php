<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_directory_edit">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="directory_id" value="<?php echo $directory_list_by_contact_id['id']; ?>">
    <input type="hidden" name="redi" value="1">
    <input type="hidden" name="redi" value="2">




    <div class="form-group">
        <label for="name"><?php _t("Type"); ?></label>
        <select name="name" class="form-control">
            <option value="<?php echo "$directory_list_by_contact_id[name]"; ?>">
                <?php echo "$directory_list_by_contact_id[name]"; ?>
            </option>
        </select>
    </div>

    <div class="form-group">
        <label for="data"><?php _t("Data"); ?></label>
        <input 
            type="text" 
            name="data" 
            class="form-control" 
            id="data" 
            value="<?php echo "$directory_list_by_contact_id[data]"; ?>"
            placeholder="<?php echo "$directory_list_by_contact_id[data]"; ?>"

            >
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>
