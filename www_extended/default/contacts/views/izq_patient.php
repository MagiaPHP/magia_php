<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon('top', 'contacts'); ?>
        <?php echo _t("Menu Patient"); ?>


        <?php if (permissions_has_permission($u_rol, "orders", "read") && modules_field_module('status', 'audio')) { ?> 
            <a href="index.php?c=contacts&a=orders_by_patient&id=<?php echo $id; ?>" class="list-group-item">
                <?php _menu_icon("top", "orders"); ?>
                <?php _t("Orders"); ?>
            </a>
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, "earprints", "read") && modules_field_module('status', 'audio')) { ?> 
            <a href="index.php?c=contacts&a=earprints_by_patient&id=<?php echo $id; ?>" class="list-group-item">
                <?php _menu_icon("top", "earprints"); ?>
                <?php _t("Earprints"); ?>
            </a>
        <?php } ?>

</div>



