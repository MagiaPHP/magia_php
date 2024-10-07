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
# Fecha de creacion del documento: 2024-09-21 12:09:14 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_documents">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start employee_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t(ucfirst("employee_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="" >
</div>
    </div>
    <!-- mg_end employee_id -->

    <!-- mg_start document -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t(ucfirst("document")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="document" class="form-control" id="document" placeholder="document"  required=""  value="" >
</div>
    </div>
    <!-- mg_end document -->

    <!-- mg_start document_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_number"><?php _t(ucfirst("document_number")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="document_number" class="form-control" id="document_number" placeholder="document_number"  required=""  value="" >
</div>
    </div>
    <!-- mg_end document_number -->

    <!-- mg_start date_delivery -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_delivery"><?php _t(ucfirst("date_delivery")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_delivery" class="form-control" id="date_delivery" placeholder="date_delivery"  value="" >
</div>
    </div>
    <!-- mg_end date_delivery -->

    <!-- mg_start date_expiration -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t(ucfirst("date_expiration")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_expiration" class="form-control" id="date_expiration" placeholder="date_expiration"  value="" >
</div>
    </div>
    <!-- mg_end date_expiration -->

    <!-- mg_start follow -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="follow"><?php _t(ucfirst("follow")); ?> </label>
        <div class="col-sm-8">            <select name="follow" class="form-control" id="follow" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end follow -->

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
