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
# Fecha de creacion del documento: 2024-09-21 12:09:02 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_benefits">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $hr_employee_benefits->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="<?php echo $hr_employee_benefits->getEmployee_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # benefit_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="benefit_code"><?php _t("Benefit_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="benefit_code" class="form-control" id="benefit_code" placeholder="benefit_code"  required=""  value="<?php echo $hr_employee_benefits->getBenefit_code(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /benefit_code ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   value="<?php echo $hr_employee_benefits->getPrice(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # company_part ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part"><?php _t("Company_part"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="company_part" class="form-control" id="company_part" placeholder="company_part"   value="<?php echo $hr_employee_benefits->getCompany_part(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /company_part ?>

    <?php # employee_part ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_part"><?php _t("Employee_part"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_part" class="form-control" id="employee_part" placeholder="employee_part"   value="<?php echo $hr_employee_benefits->getEmployee_part(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /employee_part ?>

    <?php # periodicity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="periodicity"><?php _t("Periodicity"); ?></label>
        <div class="col-sm-8">
               <select name="periodicity" class="form-control selectpicker" id="periodicity" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_benefit_periodicity_select("code", array("code"), $hr_employee_benefits->getPeriodicity() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /periodicity ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_employee_benefits->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($hr_employee_benefits->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_benefits->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

