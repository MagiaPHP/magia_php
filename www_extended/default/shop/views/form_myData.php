<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_myInfoUpdateData">
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>">

    <div class="form-group">
        <label for="company_name"><?php _t("Company"); ?></label>
        <input name="company_name" type="text" class="form-control" id="company_name" placeholder="Audio SPRL " value="<?php echo contacts_field_id("name", $u_owner_id); ?>">
    </div>

    <?php
    $i = 0;
    foreach (directory_names_list() as $key => $directory_names_list) {

        if (!directory_list_by_contact_name($u_id, $directory_names_list["name"])) {



            echo '<div class="form-group">
                        <label for="' . $directory_names_list["name"] . '">' . $directory_names_list["name"] . '</label>
                        <input 
                        name="directory[' . $directory_names_list["name"] . ']" 
                        type="text" 
                        class="form-control" 
                        id="directory[' . $directory_names_list["name"] . ']" 
                        placeholder="" 
                        value="' . directory_list_by_contact_name($u_id, $directory_names_list["name"])['data'] . '"
                        >
                    </div>';
            $i++;
        }
    }
    ?>

    <?php if ($i > 0) { ?>
        <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
    <?php } ?>    

    <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>        
</form>
