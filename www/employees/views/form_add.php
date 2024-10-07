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
# Fecha de creacion del documento: 2024-10-03 18:10:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start company_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_id"><?php _t(ucfirst("company_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="company_id" class="form-control" id="company_id" placeholder="company_id"   value="" >
</div>
    </div>
    <!-- mg_end company_id -->

    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start owner_ref -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_ref"><?php _t(ucfirst("owner_ref")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="owner_ref" class="form-control" id="owner_ref" placeholder="owner_ref"  value="" >
</div>
    </div>
    <!-- mg_end owner_ref -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end date -->

    <!-- mg_start cargo -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="cargo"><?php _t(ucfirst("cargo")); ?>  * </label>
        <div class="col-sm-8">               <select name="cargo" class="form-control selectpicker" id="cargo" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_categories_select("category", array("category"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end cargo -->

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
