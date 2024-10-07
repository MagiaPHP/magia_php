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
# Fecha de creacion del documento: 2024-09-27 08:09:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks_categories">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start father_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t(ucfirst("father_id")); ?> </label>
        <div class="col-sm-8">               <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_categories_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end father_id -->

    <!-- mg_start category -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t(ucfirst("category")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="category" class="form-control" id="category" placeholder="category"  required=""  value="" >
</div>
    </div>
    <!-- mg_end category -->

    <!-- mg_start color -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t(ucfirst("color")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="color" class="form-control" id="color" placeholder="color"  required=""  value="" >
</div>
    </div>
    <!-- mg_end color -->

    <!-- mg_start icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t(ucfirst("icon")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon"  value="" >
</div>
    </div>
    <!-- mg_end icon -->

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
