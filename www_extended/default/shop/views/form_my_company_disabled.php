<form action="index.php" method="post">

    <div class="form-group">

        <label for="company_name"><?php _t("Company"); ?></label>

        <input 
            name="company_name" 
            type="text" 
            class="form-control" 
            id="company_name" 
            placeholder="Audio SPRL" 
            value="<?php echo contacts_field_id("name", $u_owner_id); ?>"
            disabled=""
            >
    </div>


    <div class="form-group">

        <label for="company_name">
            <?php _t("TVA"); ?>
        </label>

        <input 
            name="tva" 
            type="text" 
            class="form-control" 
            id="tva" 
            placeholder="" 
            value="<?php echo contacts_field_id("tva", $u_owner_id); ?>"
            readonly=""
            >
    </div>

    <button type="submit" class="btn btn-default" disabled=""><?php _t("Edit"); ?></button>

</form>

