<?php
//vardump($banks_list_by_contact_id['id']);
?>

<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_banks_set_for_invoices">
    <input type="hidden" name="bank_id" value="<?php echo $banks_list_by_contact_id['id']; ?>">

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-danger"><?php _t('Yes, do it'); ?></button>
        </div>
    </div>


</form>