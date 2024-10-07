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
# Fecha de creacion del documento: 2024-09-24 17:09:50 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_work_status">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start available -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="available"><?php _t(ucfirst("available")); ?>  * </label>
        <div class="col-sm-8">            <select name="available" class="form-control" id="available" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
<p class="help-block"><?php echo _tr("available to work"); ?></p></div>
    </div>
    <!-- mg_end available -->

    <!-- mg_start color -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t(ucfirst("color")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="color" class="form-control" id="color" placeholder="color"  value="" >
</div>
    </div>
    <!-- mg_end color -->

    <!-- mg_start icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t(ucfirst("icon")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon"  required=""  value="" >
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
