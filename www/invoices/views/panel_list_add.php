
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "invoices"); ?>
        <?php echo _t("Invoices"); ?>
    </a>

    <a href="index.php?c=invoices" class="list-group-item"><?php echo icon("list"); ?> <?php _t("List"); ?></a>


    <?php
    foreach (_menus_search_by_controller_location($c, _menus_get_file_name(__FILE__)) as $key => $msbcl) {
        echo '<a href="' . $msbcl["url"] . '"  target="' . $msbcl["target"] . '" class="list-group-item"><span class="' . $msbcl["icon"] . '"></span> ' . $msbcl["label"] . '</a>';
    }
    ?>

    <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
        <a 
            href="index.php?c=_menus&a=add&location=<?php echo _menus_get_file_name(__FILE__); ?>" 
            class="list-group-item list-group-item-info">
                <?php echo icon('plus'); ?> 
                <?php _t("Add items here"); ?>
        </a>
        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1" class="list-group-item list-group-item-danger">
            <?php echo icon("eye-close"); ?>
            <?php _t("Hide this panel"); ?>
        </a>

    <?php }
    ?>


</div>