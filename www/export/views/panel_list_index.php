

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon('top', "export") ?>
        <?php echo _t("Export"); ?>
    </a>
    <a href="index.php?c=export&a=contacts" class="list-group-item">
        <?php _menu_icon('top', "contacts") ?> 
        <?php _t("Contacts"); ?>
    </a>
    <a href="index.php?c=export&a=invoices" class="list-group-item">
        <?php _menu_icon('top', "invoices") ?> 
        <?php _t("Invoices"); ?>
    </a>

    <a href="index.php?c=export&a=credit_notes" class="list-group-item"><?php _menu_icon('top', "credit_notes") ?> <?php _t("Credit notes"); ?></a>

    <?php
    if (modules_field_module('status', 'expenses')) {
        ?>
        <a href="index.php?c=export&a=expenses" class="list-group-item">
            <?php _menu_icon('top', "expenses") ?> 
            <?php _t("Expenses"); ?>
        </a>
    <?php } ?>
    <a href="index.php?c=export&a=balance" class="list-group-item"><?php _menu_icon('top', "balance") ?> <?php _t("Balance"); ?></a>


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













