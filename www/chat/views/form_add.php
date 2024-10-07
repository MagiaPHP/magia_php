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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="chat">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php users_select("id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start order_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_id"><?php _t(ucfirst("order_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="order_id" class="form-control" id="order_id" placeholder="order_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end order_id -->

    <!-- mg_start message -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t(ucfirst("message")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="message" class="form-control" id="message" placeholder="message"  required=""  value="" >
</div>
    </div>
    <!-- mg_end message -->

    <!-- mg_start user -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="user"><?php _t(ucfirst("user")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="user" class="form-control" id="user" placeholder="user"  required=""  value="" >
</div>
    </div>
    <!-- mg_end user -->

  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
