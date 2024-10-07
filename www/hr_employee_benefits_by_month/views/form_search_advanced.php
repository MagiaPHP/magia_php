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
# Fecha de creacion del documento: 2024-09-21 12:09:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="hr_employee_benefits_by_month">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="" >
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="year" class="form-control" id="year" placeholder="year"  required=""  value="" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Month"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="month" class="form-control" id="month" placeholder="month"  required=""  value="" >
        </div>	
    </div>
    <?php # /month ?>

    <?php # benefit_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="benefit_code"><?php _t("Benefit_code"); ?></label>
        <div class="col-sm-8">
               <select name="benefit_code" class="form-control selectpicker" id="benefit_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_benefits_select("code", array("code"), $hr_employee_benefits_by_month->getBenefit_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /benefit_code ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   required=""  value="" >
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   value="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # company_part ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part"><?php _t("Company_part"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_part" class="form-control" id="company_part" placeholder="company_part"   value="" >
        </div>	
    </div>
    <?php # /company_part ?>

    <?php # employee_part ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_part"><?php _t("Employee_part"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_part" class="form-control" id="employee_part" placeholder="employee_part"   value="" >
        </div>	
    </div>
    <?php # /employee_part ?>

    <?php # company_part_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part_value"><?php _t("Company_part_value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_part_value" class="form-control" id="company_part_value" placeholder="company_part_value"   value="" >
        </div>	
    </div>
    <?php # /company_part_value ?>

    <?php # employee_part_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_part_value"><?php _t("Employee_part_value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_part_value" class="form-control" id="employee_part_value" placeholder="employee_part_value"   value="" >
        </div>	
    </div>
    <?php # /employee_part_value ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
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
