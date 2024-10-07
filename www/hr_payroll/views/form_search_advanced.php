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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="hr_payroll">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_select("contact_id", array("contact_id"), $hr_payroll->getEmployee_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # date_entry ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_entry"><?php _t("Date_entry"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_entry" class="form-control" id="date_entry" placeholder="date_entry"  value="" >
        </div>	
    </div>
    <?php # /date_entry ?>

    <?php # address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t("Address"); ?></label>
        <div class="col-sm-8">
            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /address ?>

    <?php # fonction ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="fonction"><?php _t("Fonction"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="fonction" class="form-control" id="fonction" placeholder="fonction"  required=""  value="" >
        </div>	
    </div>
    <?php # /fonction ?>

    <?php # salary_base ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="salary_base"><?php _t("Salary_base"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="salary_base" class="form-control" id="salary_base" placeholder="salary_base"   value="" >
        </div>	
    </div>
    <?php # /salary_base ?>

    <?php # civil_status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="civil_status"><?php _t("Civil_status"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="civil_status" class="form-control" id="civil_status" placeholder="civil_status"  value="" >
        </div>	
    </div>
    <?php # /civil_status ?>

    <?php # tax_system ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax_system"><?php _t("Tax_system"); ?></label>
        <div class="col-sm-8">
            <textarea name="tax_system" class="form-control" id="tax_system" placeholder="tax_system - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . tax_system . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /tax_system ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="" >
        </div>	
    </div>
    <?php # /date_end ?>

    <?php # value_round ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value_round"><?php _t("Value_round"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value_round" class="form-control" id="value_round" placeholder="value_round"   value="" >
        </div>	
    </div>
    <?php # /value_round ?>

    <?php # to_pay ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="to_pay"><?php _t("To_pay"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="to_pay" class="form-control" id="to_pay" placeholder="to_pay"   required=""  value="" >
        </div>	
    </div>
    <?php # /to_pay ?>

    <?php # account_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t("Account_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="account_number" class="form-control" id="account_number" placeholder="account_number"  value="" >
        </div>	
    </div>
    <?php # /account_number ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # extras ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="extras"><?php _t("Extras"); ?></label>
        <div class="col-sm-8">
            <textarea name="extras" class="form-control" id="extras" placeholder="extras - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . extras . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /extras ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # date_registre ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_registre" class="form-control" id="date_registre" placeholder="date_registre"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_registre ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
               <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_payroll_status_select("code", array("code"), $hr_payroll->getStatus() , array()); ?>                        
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
