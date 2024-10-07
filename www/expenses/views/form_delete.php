<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $expenses->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # office_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id"><?php _t("Office_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="office_id" class="form-control" id="office_id" placeholder="office_id"   value="<?php echo $expenses->getOffice_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /office_id ?>

    <?php # office_id_counter_year_month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter_year_month"><?php _t("Office_id_counter_year_month"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="office_id_counter_year_month" class="form-control" id="office_id_counter_year_month" placeholder="office_id_counter_year_month"   value="<?php echo $expenses->getOffice_id_counter_year_month(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /office_id_counter_year_month ?>

    <?php # office_id_counter_year_trimestre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter_year_trimestre"><?php _t("Office_id_counter_year_trimestre"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="office_id_counter_year_trimestre" class="form-control" id="office_id_counter_year_trimestre" placeholder="office_id_counter_year_trimestre"   value="<?php echo $expenses->getOffice_id_counter_year_trimestre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /office_id_counter_year_trimestre ?>

    <?php # office_id_counter ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="office_id_counter"><?php _t("Office_id_counter"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="office_id_counter" class="form-control" id="office_id_counter" placeholder="office_id_counter"   value="<?php echo $expenses->getOffice_id_counter(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /office_id_counter ?>

    <?php # my_ref ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="my_ref"><?php _t("My_ref"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="my_ref" class="form-control" id="my_ref" placeholder="my_ref"  value="<?php echo $expenses->getMy_ref(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /my_ref ?>

    <?php # father_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="father_id" class="form-control" id="father_id" placeholder="father_id"   value="<?php echo $expenses->getFather_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # category_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t("Category_code"); ?></label>
        <div class="col-sm-8">
               <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                expenses_categories_select("code", array("code"), $expenses->getCategory_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /category_code ?>

    <?php # invoice_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_number"><?php _t("Invoice_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="invoice_number" class="form-control" id="invoice_number" placeholder="invoice_number"  value="<?php echo $expenses->getInvoice_number(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /invoice_number ?>

    <?php # budget_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="budget_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="budget_id" class="form-control" id="budget_id" placeholder="budget_id"   value="<?php echo $expenses->getBudget_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /budget_id ?>

    <?php # credit_note_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="credit_note_id"><?php _t("Credit_note_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="credit_note_id" class="form-control" id="credit_note_id" placeholder="credit_note_id"   value="<?php echo $expenses->getCredit_note_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /credit_note_id ?>

    <?php # provider_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="provider_id"><?php _t("Provider_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="provider_id" class="form-control" id="provider_id" placeholder="provider_id"   required=""  value="<?php echo $expenses->getProvider_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /provider_id ?>

    <?php # seller_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="seller_id"><?php _t("Seller_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="seller_id" class="form-control" id="seller_id" placeholder="seller_id"   value="<?php echo $expenses->getSeller_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /seller_id ?>

    <?php # clon_from_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="clon_from_id"><?php _t("Clon_from_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="clon_from_id" class="form-control" id="clon_from_id" placeholder="clon_from_id"   value="<?php echo $expenses->getClon_from_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /clon_from_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="<?php echo $expenses->getTitle(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # addresses_billing ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="addresses_billing"><?php _t("Addresses_billing"); ?></label>
        <div class="col-sm-8">
            <textarea name="addresses_billing" class="form-control" id="addresses_billing" placeholder="addresses_billing - textarea"  disabled="" ><?php echo $expenses->getAddresses_billing(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . addresses_billing . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /addresses_billing ?>

    <?php # addresses_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="addresses_delivery"><?php _t("Addresses_delivery"); ?></label>
        <div class="col-sm-8">
            <textarea name="addresses_delivery" class="form-control" id="addresses_delivery" placeholder="addresses_delivery - textarea"  disabled="" ><?php echo $expenses->getAddresses_delivery(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . addresses_delivery . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /addresses_delivery ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  value="<?php echo $expenses->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $expenses->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # deadline ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="deadline"><?php _t("Deadline"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="deadline" class="form-control" id="deadline" placeholder="deadline"  value="<?php echo $expenses->getDeadline(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /deadline ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   value="<?php echo $expenses->getTotal(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="tax" class="form-control" id="tax" placeholder="tax"   value="<?php echo $expenses->getTax(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /tax ?>

    <?php # advance ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="advance"><?php _t("Advance"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="advance" class="form-control" id="advance" placeholder="advance"   value="<?php echo $expenses->getAdvance(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /advance ?>

    <?php # balance ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="balance"><?php _t("Balance"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="balance" class="form-control" id="balance" placeholder="balance"   value="<?php echo $expenses->getBalance(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /balance ?>

    <?php # comments ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comments"><?php _t("Comments"); ?></label>
        <div class="col-sm-8">
            <textarea name="comments" class="form-control" id="comments" placeholder="comments - textarea"  disabled="" ><?php echo $expenses->getComments(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comments . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /comments ?>

    <?php # comments_private ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comments_private"><?php _t("Comments_private"); ?></label>
        <div class="col-sm-8">
            <textarea name="comments_private" class="form-control" id="comments_private" placeholder="comments_private - textarea"  disabled="" ><?php echo $expenses->getComments_private(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comments_private . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /comments_private ?>

    <?php # r1 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="r1"><?php _t("R1"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="r1" class="form-control" id="r1" placeholder="r1"  value="<?php echo $expenses->getR1(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /r1 ?>

    <?php # r2 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="r2"><?php _t("R2"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="r2" class="form-control" id="r2" placeholder="r2"  value="<?php echo $expenses->getR2(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /r2 ?>

    <?php # r3 ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="r3"><?php _t("R3"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="r3" class="form-control" id="r3" placeholder="r3"  value="<?php echo $expenses->getR3(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /r3 ?>

    <?php # fc ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="fc"><?php _t("Fc"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="fc" class="form-control" id="fc" placeholder="fc"  value="<?php echo $expenses->getFc(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /fc ?>

    <?php # date_update ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_update" class="form-control" id="date_update" placeholder="date_update"  value="<?php echo $expenses->getDate_update(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_update ?>

    <?php # days ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days"   value="<?php echo $expenses->getDays(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /days ?>

    <?php # ce ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="ce"  value="<?php echo $expenses->getCe(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /ce ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="<?php echo $expenses->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="<?php echo $expenses->getType(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /type ?>

    <?php # every ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="every"><?php _t("Every"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="every" class="form-control" id="every" placeholder="every"  value="<?php echo $expenses->getEvery(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /every ?>

    <?php # times ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="times"><?php _t("Times"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="times" class="form-control" id="times" placeholder="times"   value="<?php echo $expenses->getTimes(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /times ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="<?php echo $expenses->getDate_start(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="<?php echo $expenses->getDate_end(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $expenses->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                expenses_status_select("code", array("code"), $expenses->getStatus() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

