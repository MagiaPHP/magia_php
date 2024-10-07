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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_categories">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
<p class="help-block"><?php echo _tr("Employee Tag"); ?></p></div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
<p class="help-block"><?php echo _tr("Name"); ?></p></div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start parent_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="parent_id"><?php _t(ucfirst("parent_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="parent_id" class="form-control" id="parent_id" placeholder="parent_id"   value="" >
<p class="help-block"><?php echo _tr("Parent Employee Tag"); ?></p></div>
    </div>
    <!-- mg_end parent_id -->

    <!-- mg_start child_ids -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="child_ids"><?php _t(ucfirst("child_ids")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="child_ids" class="form-control" id="child_ids" placeholder="child_ids"   value="" >
<p class="help-block"><?php echo _tr("Child Categories"); ?></p></div>
    </div>
    <!-- mg_end child_ids -->

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
