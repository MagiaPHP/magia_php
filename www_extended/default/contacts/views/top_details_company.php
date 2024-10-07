<?php if (modules_field_module('status', 'invoices')) { ?>
    <?php if (contacts_field_id('billing_method', $id) !== 'M' && contacts_have_monthly_invoices($id) > 0) { ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong><?php _t('Warning'); ?>!</strong> 
            <?php _t("This client has monthly bills, update the billing method to monthly for this contact?"); ?> 
            <a href="index.php?c=contacts&a=ok_billing_method&contact_id=<?php echo $id; ?>&redi=1&billing_method=M"><?php _t("Yes"); ?>
            </a>
        </div>
    <?php } ?>
<?php } ?>