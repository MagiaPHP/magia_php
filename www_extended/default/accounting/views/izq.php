<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'accounting'); ?>
        <?php echo _t("Accounting"); ?>
    </a>

    <?php if (modules_field_module('status', 'budgets') && permissions_has_permission($u_rol, 'budgets', 'read')) { ?>
        <a href="index.php?c=budgets" class="list-group-item"><?php _t("Budgets"); ?></a>
    <?php } ?>


    <?php if (modules_field_module('status', 'invoices') && permissions_has_permission($u_rol, 'invoices', 'read')) { ?>
        <a href="index.php?c=invoices" class="list-group-item"><?php _t("Sales invoices"); ?></a>
    <?php } ?>


    <?php if (modules_field_module('status', 'credit_notes') && permissions_has_permission($u_rol, 'credit_notes', 'read')) { ?>
        <a href="index.php?c=credit_notes" class="list-group-item"><?php _t("Credit notes"); ?></a>
    <?php } ?>


    <?php if (modules_field_module('status', 'expenses') && permissions_has_permission($u_rol, 'expenses', 'read')) { ?>
        <a href="index.php?c=expenses" class="list-group-item"><?php _t("Expenses"); ?></a>
    <?php } ?>


    <?php if (modules_field_module('status', 'banks_lines') && permissions_has_permission($u_rol, 'banks_lines', 'read')) { ?>
        <a href="index.php?c=banks_lines" class="list-group-item"><?php _t("Banks lines"); ?></a>
    <?php } ?>
        
        
    <?php if (modules_field_module('status', 'balance') && permissions_has_permission($u_rol, 'balance', 'read')) { ?>
        <a href="index.php?c=balance" class="list-group-item"><?php _t("Balance"); ?></a>
    <?php } ?>


</div>


