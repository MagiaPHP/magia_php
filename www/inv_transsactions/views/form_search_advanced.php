<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="inv_transsactions">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_id" class="form-control" id="company_id" placeholder="company_id" value="" >
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # product ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product"><?php _t("Product"); ?></label>
        <div class="col-sm-8">
               <select name="product" class="form-control selectpicker" id="product" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                inv_products_select("product", array("product"), $inv_transsactions->getProduct() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product ?>

    <?php # transaction_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="transaction_number"><?php _t("Transaction_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="transaction_number" class="form-control" id="transaction_number" placeholder="transaction_number" value="" >
        </div>	
    </div>
    <?php # /transaction_number ?>

    <?php # period ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="period"><?php _t("Period"); ?></label>
        <div class="col-sm-8">
               <select name="period" class="form-control selectpicker" id="period" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                inv_periods_select("period", array("period"), $inv_transsactions->getPeriod() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /period ?>

    <?php # start_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t("Start_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date" value="" >
        </div>	
    </div>
    <?php # /start_date ?>

    <?php # operation_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="operation_number"><?php _t("Operation_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="operation_number" class="form-control" id="operation_number" placeholder="operation_number" value="" >
        </div>	
    </div>
    <?php # /operation_number ?>

    <?php # currency ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="currency"><?php _t("Currency"); ?></label>
        <div class="col-sm-8">
               <select name="currency" class="form-control selectpicker" id="currency" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                currencies_select("code", array("code"), $inv_transsactions->getCurrency() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /currency ?>

    <?php # amount ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="amount"><?php _t("Amount"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="amount" class="form-control" id="amount" placeholder="amount" value="" >
        </div>	
    </div>
    <?php # /amount ?>

    <?php # percentage ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="percentage"><?php _t("Percentage"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="percentage" class="form-control" id="percentage" placeholder="percentage" value="" >
        </div>	
    </div>
    <?php # /percentage ?>

    <?php # term ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="term"><?php _t("Term"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="term" class="form-control" id="term" placeholder="term" value="" >
        </div>	
    </div>
    <?php # /term ?>

    <?php # interest ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="interest"><?php _t("Interest"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="interest" class="form-control" id="interest" placeholder="interest" value="" >
        </div>	
    </div>
    <?php # /interest ?>

    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total" value="" >
        </div>	
    </div>
    <?php # /total ?>

    <?php # retencion ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="retencion"><?php _t("Retencion"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="retencion" class="form-control" id="retencion" placeholder="retencion" value="" >
        </div>	
    </div>
    <?php # /retencion ?>

    <?php # company_comission ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_comission"><?php _t("Company_comission"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_comission" class="form-control" id="company_comission" placeholder="company_comission" value="" >
        </div>	
    </div>
    <?php # /company_comission ?>

    <?php # comision_bolsa ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comision_bolsa"><?php _t("Comision_bolsa"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="comision_bolsa" class="form-control" id="comision_bolsa" placeholder="comision_bolsa" value="" >
        </div>	
    </div>
    <?php # /comision_bolsa ?>

    <?php # total_receivable ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="total_receivable"><?php _t("Total_receivable"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="total_receivable" class="form-control" id="total_receivable" placeholder="total_receivable" value="" >
        </div>	
    </div>
    <?php # /total_receivable ?>

    <?php # expiration_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="expiration_date"><?php _t("Expiration_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="expiration_date" class="form-control" id="expiration_date" placeholder="expiration_date" value="" >
        </div>	
    </div>
    <?php # /expiration_date ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>
