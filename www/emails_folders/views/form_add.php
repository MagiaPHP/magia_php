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
# Fecha de creacion del documento: 2024-09-04 08:09:31 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails_folders">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start folder -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="folder"><?php _t(ucfirst("folder")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="folder" class="form-control" id="folder" placeholder="folder"  required=""  value="" >
</div>
    </div>
    <!-- mg_end folder -->

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
