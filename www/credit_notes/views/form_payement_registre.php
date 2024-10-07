
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_payement_registre">

    <input type="hidden" name="credit_note_id" value="<?php echo $cn->getId(); ?>">

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account"); ?>
            <a href="index.php?c=contacts&a=banks&id=<?php echo $u_owner_id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
        </label>
        <div class="col-sm-8">


            <select  name="account_number" class="form-control" id="account_number">                                
                <?php
                // La lista de banco depende de si es multi tva
                // 

                if (IS_MULTI_VAT) {
                    // lista de los bancos segun el owner_id del documento 
                    $banks_list_by_contact_id = banks_list_by_contact_id($cn->getOffice_id());
                } else {
                    // lista de los bancos segun el owner_id del usuario conectado 
                    $banks_list_by_contact_id = banks_list_by_contact_id($u_owner_id);
                }

                foreach ($banks_list_by_contact_id as $key => $banks_list_by_contact_id) {

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

                <?php //banks_select("account_number", "account_number", array(), array());    ?>                        
            </select>


        </div>	
    </div>
    <?php # /account_number   ?>

    <?php # total   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Sub_total"); ?> </label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="total" 
                class="form-control" 
                id="total" 
                placeholder=""
                value="<?php echo credit_notes_field_id("total", $id) + credit_notes_field_id("tax", $id) - credit_notes_field_id("returned", $id) ?>"
                readonly=""
                >
        </div>	
    </div>
    <?php # /total   ?>



    <?php # date   ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
    <?php # date ?>
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
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="date" 
                class="form-control" 
                id="date" 
                placeholder=""
                value="<?php echo substr(magia_dates_add_day(date("y-m-d"), 0), 0, 10); ?>"
                required=""
                >
        </div>	
    </div>
    <?php # /date   ?>


    <?php # /date registre   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Registre Date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="date" 
                class="form-control" 
                id="date" 
                placeholder=""
                value="<?php echo ((date("y-m-d h:m:s"))); ?>"
                disabled=""
                >
        </div>	
    </div>
    <?php # /date   ?>

    <?php # ref   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?></label>
        <div class="col-sm-8">
            <input 
                type="number"  
                name="ref" 
                class="form-control" 
                id="ref" 
                placeholder="<?php _t("Operation number"); ?>"
                required=""
                step="0.1"
                >
            <span id="ref" class="help-block">
                <?php _t("Transaction number according to your bank statements"); ?>
            </span>
        </div>	
    </div>
    <?php # /ref   ?>


    <?php # description   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="description" class="form-control" id="description" placeholder="">
        </div>	
    </div>
    <?php # /description   ?>






    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
