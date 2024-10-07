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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_benefits_by_month">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start employee_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t(ucfirst("employee_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end employee_id -->

    <!-- mg_start year -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t(ucfirst("year")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="year" class="form-control" id="year" placeholder="year"  required=""  value="" >
</div>
    </div>
    <!-- mg_end year -->

    <!-- mg_start month -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t(ucfirst("month")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="month" class="form-control" id="month" placeholder="month"  required=""  value="" >
</div>
    </div>
    <!-- mg_end month -->

    <!-- mg_start benefit_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="benefit_code"><?php _t(ucfirst("benefit_code")); ?>  * </label>
        <div class="col-sm-8">               <select name="benefit_code" class="form-control selectpicker" id="benefit_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_benefits_select("code", array("code"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end benefit_code -->

    <!-- mg_start quantity -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t(ucfirst("quantity")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   required=""  value="" >
</div>
    </div>
    <!-- mg_end quantity -->

    <!-- mg_start price -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t(ucfirst("price")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   value="" >
</div>
    </div>
    <!-- mg_end price -->

    <!-- mg_start company_part -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part"><?php _t(ucfirst("company_part")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="company_part" class="form-control" id="company_part" placeholder="company_part"   value="" >
</div>
    </div>
    <!-- mg_end company_part -->

    <!-- mg_start employee_part -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_part"><?php _t(ucfirst("employee_part")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="employee_part" class="form-control" id="employee_part" placeholder="employee_part"   value="" >
</div>
    </div>
    <!-- mg_end employee_part -->

    <!-- mg_start company_part_value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part_value"><?php _t(ucfirst("company_part_value")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="company_part_value" class="form-control" id="company_part_value" placeholder="company_part_value"   value="" >
</div>
    </div>
    <!-- mg_end company_part_value -->

    <!-- mg_start employee_part_value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_part_value"><?php _t(ucfirst("employee_part_value")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="employee_part_value" class="form-control" id="employee_part_value" placeholder="employee_part_value"   value="" >
</div>
    </div>
    <!-- mg_end employee_part_value -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
