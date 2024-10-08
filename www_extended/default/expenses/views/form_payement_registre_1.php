<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_payement_registre">
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account"); ?>
            <a href="index.php?c=contacts&a=banks&id=<?php echo $u_owner_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
        </label>
        <div class="col-sm-8">
            <select  name="account_number" class="form-control" id="account_number">                                
                <?php
                foreach (banks_list_by_contact_id($u_owner_id) as $key => $banks_list_by_contact_id) {
                    $disabled = ($banks_list_by_contact_id['status'] == 0 ) ? ' disabled ' : "";
                    ?>
                    <option 
                        value="<?php echo $banks_list_by_contact_id['account_number']; ?>"
                        <?php echo $disabled; ?>    
                        ><?php echo $banks_list_by_contact_id['bank']; ?> : 
                            <?php echo $banks_list_by_contact_id['account_number']; ?> 
                        (<?php echo monedaf(balance_total_by_account_number($banks_list_by_contact_id['account_number'])) ?>)
                    </option>
                <?php } ?>

                <?php //banks_select("account_number", "account_number", array(), array());  ?>                        
            </select>

        </div>	
    </div>
    <?php # /account_number  ?>



    <?php # total  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="total" 
                class="form-control" 
                id="total" 
                placeholder=""
                value="<?php echo moneda_value(invoices_field_id("total", $id) + invoices_field_id("tax", $id) - invoices_field_id("advance", $id)) ?>"
                >
        </div>	
    </div>
    <?php # /total  ?>



    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date  ?>
    <script>
        $(function () {
            $("#date").datepicker({
                // minDate: +0,
                // maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"

            });
        });
    </script>  
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="<?php _t("Operation date"); ?>"
                value="<?php echo substr(magia_dates_add_day(date("y-m-d"), 0), 0, 10); ?>"
                >
        </div>	
    </div>
    <?php # /date  ?>

    <?php # ref  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="ref" class="form-control" id="ref" placeholder="<?php _t("Operation number"); ?>" required="">

            <span id="ref" class="help-block">
                <?php _t("Transaction number according to your bank statements"); ?>
            </span>

        </div>	
    </div>
    <?php # /ref  ?>


    <?php # description  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder="">
        </div>	
    </div>
    <?php # /description  ?>


    <?php # ce  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Communication"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="ce" class="form-control" id="ce" placeholder="+++123/45678/01221+++" value="<?php echo invoices_field_id("ce", $id); ?>" readonly="">
        </div>	
    </div>
    <?php # /ce  ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    

            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>
        </div>      							
    </div>      							

</form>