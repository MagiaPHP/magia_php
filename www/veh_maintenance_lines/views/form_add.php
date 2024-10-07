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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_maintenance_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start maintenance_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="maintenance_id"><?php _t(ucfirst("maintenance_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="maintenance_id" class="form-control selectpicker" id="maintenance_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                veh_maintenance_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end maintenance_id -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start price -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t(ucfirst("price")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price"   required=""  value="" >
</div>
    </div>
    <!-- mg_end price -->

    <!-- mg_start quantity -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t(ucfirst("quantity")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity"   required=""  value="" >
</div>
    </div>
    <!-- mg_end quantity -->

    <!-- mg_start total -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="total"><?php _t(ucfirst("total")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="total" class="form-control" id="total" placeholder="total"   value="" >
</div>
    </div>
    <!-- mg_end total -->

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
