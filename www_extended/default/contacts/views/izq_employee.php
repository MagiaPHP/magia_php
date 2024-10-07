

<div class="list-group">
    <a href="#" class="list-group-item active">

        <?php _menu_icon('top', 'contacts'); ?>

        <?php _t("Employee"); ?>

        <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
            <a href="index.php?c=contacts&a=details&id=<?php echo $id; ?>" class="list-group-item">
                <?php _menu_icon("top", "contacts"); ?>
                
                <?php echo contacts_formated($id); ?>
:
                <?php echo $id; ?> 
            </a>
        <?php } ?>


        <?php if (permissions_has_permission($u_rol, "orders", "read") && modules_field_module('status', 'audio')) { ?> 
            <a href="index.php?c=contacts&a=orders_create_by&id=<?php echo $id; ?>" class="list-group-item">
                <?php _menu_icon("top", "orders"); ?>
                <?php _t("Orders create by"); ?>
            </a>
        <?php } ?>

        <?php if (permissions_has_permission($u_rol, "directory", "read") && false) { ?> 
            <a href="index.php?c=contacts&a=directory&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "directory"); ?>
                <?php _t("Directory"); ?>
            </a>
        <?php } ?>


        <?php if (permissions_has_permission($u_rol, "addresses", "read") && false) { ?> 
            <a href="index.php?c=contacts&a=addresses&id=<?php echo "$id"; ?>" class="list-group-item <?php echo ($a == 'addresses') ? "list-group-item-info" : ""; ?>">
                <?php _menu_icon("top", "addresses"); ?>
                <?php _t("Addresses"); ?>
            </a>

        <?php } ?>



        <?php
        // solo si es mi empleado 
        // agego el banco 
        if (permissions_has_permission($u_rol, "banks", "read") && false) {
            ?> 
            <a href="index.php?c=contacts&a=banks&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "banks"); ?>
                <?php _t("Banks"); ?>
            </a>
        <?php } ?>



        <?php if (permissions_has_permission($u_rol, "system", "read")) { ?> 
            <a href="index.php?c=contacts&a=system&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "system") ?>
                <?php _t("System"); ?>
            </a>
        <?php } ?>



        <?php if (permissions_has_permission($u_rol, "logs", "read")) { ?> 
            <a href="index.php?c=contacts&a=logs&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "logs"); ?>
                <?php _t("Logs"); ?>
            </a>    
        <?php } ?>



        <?php if (permissions_has_permission($u_rol, "comments", "read")) { ?> 
            <a href="index.php?c=contacts&a=comments&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "comments"); ?>
                <?php _t("Comments"); ?>
            </a>    
        <?php } ?>



        <?php if (permissions_has_permission($u_rol, "permissions", "resssssssad")) { ?> 
            <a href="index.php?c=contacts&a=permissions&id=<?php echo "$id"; ?>" class="list-group-item">
                <?php _menu_icon("top", "permissions"); ?>
                <?php _t("Permissions"); ?>
            </a>    
        <?php } ?>


</div>