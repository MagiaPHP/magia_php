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
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_drivers">
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
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start country -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t(ucfirst("country")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="country" class="form-control" id="country" placeholder="country"  required=""  value="" >
</div>
    </div>
    <!-- mg_end country -->

    <!-- mg_start license -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="license"><?php _t(ucfirst("license")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="license" class="form-control" id="license" placeholder="license"  required=""  value="" >
</div>
    </div>
    <!-- mg_end license -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  required=""  value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="number"><?php _t(ucfirst("number")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="number" class="form-control" id="number" placeholder="number"  required=""  value="" >
</div>
    </div>
    <!-- mg_end number -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  required=""  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

    <!-- mg_start expired -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="expired"><?php _t(ucfirst("expired")); ?> </label>
        <div class="col-sm-8">            <select name="expired" class="form-control" id="expired" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end expired -->

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
