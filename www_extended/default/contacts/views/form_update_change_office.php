<form method="post" action="index.php" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_contacts_change_office">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">




    <div class="form-group">
        <label for="office"><?php echo _t("Actual"); ?></label>
        <p><?php echo contacts_formated(contacts_work_at($id)); ?></p>
    </div>


    <div class="form-group">
        <label for="office"><?php echo _t("New office"); ?></label>
        <select name="office_id" class="form-control">
            <?php
            foreach (offices_list_by_headoffice(contacts_work_for($id)) as $key => $office) {
                $disabled = (contacts_work_at($id) == $office['id'] ) ? " disabled " : "";
                $selected = ( contacts_work_at($id) == $office['id'] ) ? " selected " : "";
                echo '<option value="' . $office['id'] . '" ' . $disabled . ' ' . $selected . '>' . contacts_formated($office['id']) . '</option>';
            }
            ?>
        </select>

        <p></p>


    </div>

    <div class="form-group">
        <label for="password"></label>
        <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
    </div>

</form>