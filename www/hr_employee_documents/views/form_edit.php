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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $hr_employee_documents->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="<?php echo $hr_employee_documents->getEmployee_id(); ?>" >
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # document ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document"><?php _t("Document"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="document" class="form-control" id="document" placeholder="document"  required=""  value="<?php echo $hr_employee_documents->getDocument(); ?>" >
        </div>	
    </div>
    <?php # /document ?>

    <?php # document_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="document_number"><?php _t("Document_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="document_number" class="form-control" id="document_number" placeholder="document_number"  required=""  value="<?php echo $hr_employee_documents->getDocument_number(); ?>" >
        </div>	
    </div>
    <?php # /document_number ?>

    <?php # date_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_delivery"><?php _t("Date_delivery"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_delivery" class="form-control" id="date_delivery" placeholder="date_delivery"  value="<?php echo $hr_employee_documents->getDate_delivery(); ?>" >
        </div>	
    </div>
    <?php # /date_delivery ?>

    <?php # date_expiration ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t("Date_expiration"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_expiration" class="form-control" id="date_expiration" placeholder="date_expiration"  value="<?php echo $hr_employee_documents->getDate_expiration(); ?>" >
        </div>	
    </div>
    <?php # /date_expiration ?>

    <?php # follow ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="follow"><?php _t("Follow"); ?></label>
        <div class="col-sm-8">
            <select name="follow" class="form-control" id="follow" >                
                <option value="1" <?php echo ($hr_employee_documents->getFollow() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_documents->getFollow() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /follow ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_employee_documents->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($hr_employee_documents->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_documents->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
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

