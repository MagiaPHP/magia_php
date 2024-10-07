<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_directory_edit">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="directory_id" value="<?php echo $directory_list_by_contact_id['id']; ?>">

    <div class="form-group">
        <label for="name"><?php _t("Type"); ?></label>
        <select name="name" class="form-control">

            <?php
            foreach (directory_names_list() as $key => $value) {

                $selected = null;

                if ($value['name'] == $directory_list_by_contact_id['name']) {
                    echo '<option value="' . $value['name'] . '"  ' . $selected . '>' . _tr($value['name']) . '</option>';
                }
            }
            ?>
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
            required=""
            >
    </div>

    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-floppy-disk"></span>    
        <?php _t("Submit"); ?>
    </button>

</form>
