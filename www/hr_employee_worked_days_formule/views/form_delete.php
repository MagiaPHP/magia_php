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
# Fecha de creacion del documento: 2024-09-21 12:09:43 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days_formule">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $hr_employee_worked_days_formule->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="employee_id" class="form-control" id="employee_id" placeholder="employee_id"   required=""  value="<?php echo $hr_employee_worked_days_formule->getEmployee_id(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # month ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t("Month"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="month" class="form-control" id="month" placeholder="month"   required=""  value="<?php echo $hr_employee_worked_days_formule->getMonth(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /month ?>

    <?php # year ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t("Year"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="year" class="form-control" id="year" placeholder="year"   required=""  value="<?php echo $hr_employee_worked_days_formule->getYear(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /year ?>

    <?php # column ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="column"><?php _t("Column"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="column" class="form-control" id="column" placeholder="column"  value="<?php echo $hr_employee_worked_days_formule->getColumn(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /column ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value"   value="<?php echo $hr_employee_worked_days_formule->getValue(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /value ?>

    <?php # formule ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="formule"><?php _t("Formule"); ?></label>
        <div class="col-sm-8">
            <textarea name="formule" class="form-control" id="formule" placeholder="formule - textarea"  disabled="" ><?php echo $hr_employee_worked_days_formule->getFormule(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . formule . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /formule ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea"  disabled="" ><?php echo $hr_employee_worked_days_formule->getNotes(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="<?php echo $hr_employee_worked_days_formule->getCode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="<?php echo $hr_employee_worked_days_formule->getDate_registre(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_employee_worked_days_formule->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($hr_employee_worked_days_formule->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_worked_days_formule->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

