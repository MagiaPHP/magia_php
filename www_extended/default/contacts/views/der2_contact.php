<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t('Employee'); ?>
    </div>
    <div class="panel-body">


        <form method="post" action="index.php" >
            <input type="hidden" name="c" value="employees">
            <input type="hidden" name="a" value="ok_cargo_update">
            <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
            <input type="hidden" name="company_id" value="<?php echo $u_owner_id; ?>">
            <input type="hidden" name="redi[redi]" value="1">



            <div class="form-group">
                <label for="cargo"><?php _t("Position in the company"); ?></label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="cargo" 
                    name="cargo" 
                    placeholder="<?php echo employees_field_by_contact_id("cargo", $id); ?>"
                    value="<?php echo employees_field_by_contact_id("cargo", $id); ?>"
                    >
            </div>

            <button type="submit" class="btn btn-default">
                <?php echo icon("floppy-disk"); ?>
                <?php _t("Update"); ?>
            </button>

        </form>



    </div>
</div>



