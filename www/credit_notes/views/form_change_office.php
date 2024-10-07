    

<form method="post" action="index.php">

    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_change_office">

    <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>">

    <input type="hidden" name="redi" value="1">

    <div class="form-group">

        <label for="new_office_id"><?php _t("Office name"); ?></label>

        <select 
            class="form-control selectpicker" 
            id="new_office_id" 
            data-live-search="true"  
            name="new_office_id" 
            required=""
            aria-required="true"

            >

            <?php
            foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {
                echo '<option value="' . $office['id'] . '">' . contacts_formated($office['id']) . '</option>';
            }
            ?>
        </select>

    </div>

    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>

