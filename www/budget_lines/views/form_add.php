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
# Fecha de creacion del documento: 2024-09-16 12:09:08 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="budget_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start budget_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="budget_id"><?php _t(ucfirst("budget_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="budget_id" class="form-control selectpicker" id="budget_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                budgets_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end budget_id -->

    <!-- mg_start order_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_id"><?php _t(ucfirst("order_id")); ?> </label>
        <div class="col-sm-8">               <select name="order_id" class="form-control selectpicker" id="order_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                orders_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end order_id -->

    <!-- mg_start category_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t(ucfirst("category_code")); ?> </label>
        <div class="col-sm-8">               <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                budgets_categories_select("code", array("code"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end category_code -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start quantity -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t(ucfirst("quantity")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   value="" >
</div>
    </div>
    <!-- mg_end quantity -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="description" class="form-control" id="description" placeholder="description"  value="" >
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start price -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t(ucfirst("price")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   value="" >
</div>
    </div>
    <!-- mg_end price -->

    <!-- mg_start discounts -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts"><?php _t(ucfirst("discounts")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="discounts" class="form-control" id="discounts" placeholder="discounts"   required=""  value="0" >
</div>
    </div>
    <!-- mg_end discounts -->

    <!-- mg_start discounts_mode -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts_mode"><?php _t(ucfirst("discounts_mode")); ?>  * </label>
        <div class="col-sm-8">               <select name="discounts_mode" class="form-control selectpicker" id="discounts_mode" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                discounts_mode_select("discount", array("discount"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end discounts_mode -->

    <!-- mg_start tax -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t(ucfirst("tax")); ?> </label>
        <div class="col-sm-8">               <select name="tax" class="form-control selectpicker" id="tax" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tax_select("value", array("value"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end tax -->

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
