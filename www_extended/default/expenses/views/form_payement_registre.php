<form class="form-horizontal" action="index.php" method="post" >


    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_payement_registre">

    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>"> 

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="expenses">
    <input type="hidden" name="redi[a]" value="details_payement">
    <input type="hidden" name="redi[params]" value="<?php echo "id=" . $expense->getId(); ?>">


    <input type="hidden" name="use_banks_lines" value="0">



    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account"); ?>

        </label>
        <div class="col-sm-8">
            <select  name="account_number" class="form-control" id="account_number">                                
                <?php foreach (banks_list_by_contact_id($expense->getOffice_id()) as $key => $banks_list_by_contact_id) { ?>
                    <option value="<?php echo $banks_list_by_contact_id['account_number']; ?>"><?php echo $banks_list_by_contact_id['bank']; ?> : <?php echo $banks_list_by_contact_id['account_number']; ?> (<?php echo monedaf(balance_total_by_account_number($banks_list_by_contact_id['account_number'])) ?>)</option>
                <?php } ?>

                <?php //banks_select("account_number", "account_number", array(), array()); ?>                        
            </select>

        </div>	
    </div>
    <?php # /account_number ?>



    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="total" 
                class="form-control" 
                id="total" 
                placeholder=""
                value="<?php echo ($expense->getTo_pay()) ?>"
                >
        </div>	
    </div>
    <?php # /total ?>

    <?php
    /**
     * <script>
      $(function () {
      $("#date").datepicker({
      // minDate: +0,
      // maxDate: "+12M +0D",
      dateFormat: "yy-mm-dd"

      });
      });
      </script>

     */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Date operation"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date"  
                name="date_operation" 
                class="form-control" 
                id="date" 
                placeholder="<?php _t("Operation date"); ?>"
                value="<?php echo substr(magia_dates_add_day(date("y-m-d"), 0), 0, 10); ?>"
                >
        </div>	
    </div>
    <?php # /date ?>

    <?php # ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ref"><?php _t("Ref"); ?> / <?php _t("Operation"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="ref" class="form-control" id="ref" placeholder="<?php _t("Operation number"); ?>" required="">

            <span id="ref" class="help-block">
                <?php _t("Transaction number according to your bank statements"); ?>
            </span>

        </div>	
    </div>
    <?php # /ref ?>


    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control"></textarea>
        </div>	
    </div>
    <?php # /description ?>


    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Communication"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
                name="ce" 
                class="form-control" 
                id="ce" 
                placeholder="+++123/45678/01221+++" 
                value="<?php echo $expense->getCe(); ?>" readonly="">
        </div>	
    </div>
    <?php # /ce ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>