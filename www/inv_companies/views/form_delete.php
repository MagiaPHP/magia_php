<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:09 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="inv_companies">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $inv_companies->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # company_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t("Company_id"); ?></label>
        <div class="col-sm-8">
               <select name="company_id" class="form-control selectpicker" id="company_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                contacts_select("id", array("id"), $inv_companies->getCompany_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /company_id ?>

    <?php # company_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_type"><?php _t("Company_type"); ?></label>
        <div class="col-sm-8">
               <select name="company_type" class="form-control selectpicker" id="company_type" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                inv_types_select("type", array("type"), $inv_companies->getCompany_type() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /company_type ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $inv_companies->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($inv_companies->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($inv_companies->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

