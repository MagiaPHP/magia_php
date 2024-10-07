<?php
// invoices mensuales inner joint con contacts 
// lista de contactos con facturas mensuales y metodo de facturacion no mensual
//vardump(count(contacts_list_with_monthly_invoices_and_billing_method_not_monthly()));
//vardump((contacts_list_with_monthly_invoices_and_billing_method_not_monthly()));
?>
<?php
// si la opcion esta activada, 
if (_options_option("config_invoices_monthly")) {
    if (
            contacts_list_with_monthly_invoices_and_billing_method_not_monthly() &&
            permissions_has_permission($u_rol, "contacts", "update")
    ) {
        ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php _t("Warning"); ?>!</strong> <?php _t("Update the billing method to monthly for all contacts that have monthly invoices?"); ?>

            <a href="index.php?c=contacts&a=ok_billing_method_all_contacts&redi=1"><?php _t("Yes"); ?></a>

        </div>    
        <?php
    }
}
?>




