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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start employee_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t(ucfirst("employee_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_select("contact_id", array("contact_id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end employee_id -->

    <!-- mg_start date_entry -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_entry"><?php _t(ucfirst("date_entry")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_entry" class="form-control" id="date_entry" placeholder="date_entry"  value="" >
<p class="help-block"><?php echo _tr("Date of entry into service"); ?></p></div>
    </div>
    <!-- mg_end date_entry -->

    <!-- mg_start address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t(ucfirst("address")); ?> </label>
        <div class="col-sm-8">            <textarea name="address" class="form-control" id="address" placeholder="address - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . address . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end address -->

    <!-- mg_start fonction -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="fonction"><?php _t(ucfirst("fonction")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="fonction" class="form-control" id="fonction" placeholder="fonction"  required=""  value="" >
</div>
    </div>
    <!-- mg_end fonction -->

    <!-- mg_start salary_base -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="salary_base"><?php _t(ucfirst("salary_base")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="salary_base" class="form-control" id="salary_base" placeholder="salary_base"   value="" >
</div>
    </div>
    <!-- mg_end salary_base -->

    <!-- mg_start civil_status -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="civil_status"><?php _t(ucfirst("civil_status")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="civil_status" class="form-control" id="civil_status" placeholder="civil_status"  value="" >
</div>
    </div>
    <!-- mg_end civil_status -->

    <!-- mg_start tax_system -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax_system"><?php _t(ucfirst("tax_system")); ?> </label>
        <div class="col-sm-8">            <textarea name="tax_system" class="form-control" id="tax_system" placeholder="tax_system - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . tax_system . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
<p class="help-block"><?php echo _tr("Régime fiscal"); ?></p></div>
    </div>
    <!-- mg_end tax_system -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

    <!-- mg_start value_round -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="value_round"><?php _t(ucfirst("value_round")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="value_round" class="form-control" id="value_round" placeholder="value_round"   value="0.000000" >
</div>
    </div>
    <!-- mg_end value_round -->

    <!-- mg_start to_pay -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="to_pay"><?php _t(ucfirst("to_pay")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="to_pay" class="form-control" id="to_pay" placeholder="to_pay"   required=""  value="" >
</div>
    </div>
    <!-- mg_end to_pay -->

    <!-- mg_start account_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="account_number"><?php _t(ucfirst("account_number")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="account_number" class="form-control" id="account_number" placeholder="account_number"  value="" >
</div>
    </div>
    <!-- mg_end account_number -->

    <!-- mg_start notes -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t(ucfirst("notes")); ?> </label>
        <div class="col-sm-8">            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end notes -->

    <!-- mg_start extras -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="extras"><?php _t(ucfirst("extras")); ?> </label>
        <div class="col-sm-8">            <textarea name="extras" class="form-control" id="extras" placeholder="extras - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . extras . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end extras -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start date_registre -->
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
