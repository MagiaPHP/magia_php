<?php
# MagiaPHP 
# file date creation: 2024-02-07 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="reminders_invoices">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $arg["redi"]; ?>">

    <?php # date_registre ?>
    <?php # invoice_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_id"><?php _t("Invoice_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="invoice_id" class="form-control" id="invoice_id" placeholder="invoice_id" value="" >
        </div>	
    </div>
    <?php # /invoice_id ?>

    <?php # invoice_solde ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_solde"><?php _t("Invoice_solde"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="invoice_solde" class="form-control" id="invoice_solde" placeholder="invoice_solde" value="" >
        </div>	
    </div>
    <?php # /invoice_solde ?>

    <?php # reminder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reminder"><?php _t("Reminder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="reminder" class="form-control" id="reminder" placeholder="reminder" value="" >
        </div>	
    </div>
    <?php # /reminder ?>

    <?php # reminder_percent ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reminder_percent"><?php _t("Reminder_percent"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="reminder_percent" class="form-control" id="reminder_percent" placeholder="reminder_percent" value="" >
        </div>	
    </div>
    <?php # /reminder_percent ?>

    <?php # invoice_to_add_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_to_add_id"><?php _t("Invoice_to_add_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="invoice_to_add_id" class="form-control" id="invoice_to_add_id" placeholder="invoice_to_add_id" value="" >
        </div>	
    </div>
    <?php # /invoice_to_add_id ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
