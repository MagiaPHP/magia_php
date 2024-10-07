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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $budget_lines->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # budget_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="budget_id"><?php _t("Budget_id"); ?></label>
        <div class="col-sm-8">
               <select name="budget_id" class="form-control selectpicker" id="budget_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                budgets_select("id", array("id"), $budget_lines->getBudget_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /budget_id ?>

    <?php # order_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_id"><?php _t("Order_id"); ?></label>
        <div class="col-sm-8">
               <select name="order_id" class="form-control selectpicker" id="order_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                orders_select("id", array("id"), $budget_lines->getOrder_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /order_id ?>

    <?php # category_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t("Category_code"); ?></label>
        <div class="col-sm-8">
               <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                budgets_categories_select("code", array("code"), $budget_lines->getCategory_code() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /category_code ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  value="<?php echo $budget_lines->getCode(); ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   value="<?php echo $budget_lines->getQuantity(); ?>" >
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" placeholder="description"  value="<?php echo $budget_lines->getDescription(); ?>" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   value="<?php echo $budget_lines->getPrice(); ?>" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # discounts ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts"><?php _t("Discounts"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="discounts" class="form-control" id="discounts" placeholder="discounts"   required=""  value="<?php echo $budget_lines->getDiscounts(); ?>" >
        </div>	
    </div>
    <?php # /discounts ?>

    <?php # discounts_mode ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="discounts_mode"><?php _t("Discounts_mode"); ?></label>
        <div class="col-sm-8">
               <select name="discounts_mode" class="form-control selectpicker" id="discounts_mode" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                discounts_mode_select("discount", array("discount"), $budget_lines->getDiscounts_mode() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /discounts_mode ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">
               <select name="tax" class="form-control selectpicker" id="tax" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tax_select("value", array("value"), $budget_lines->getTax() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $budget_lines->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="status" class="form-control" id="status" placeholder="status"   value="<?php echo $budget_lines->getStatus(); ?>" >
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

