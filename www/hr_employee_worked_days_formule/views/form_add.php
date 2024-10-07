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

    <!-- mg_start month -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="month"><?php _t(ucfirst("month")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="month" class="form-control" id="month" placeholder="month"   required=""  value="" >
</div>
    </div>
    <!-- mg_end month -->

    <!-- mg_start year -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="year"><?php _t(ucfirst("year")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="year" class="form-control" id="year" placeholder="year"   required=""  value="" >
</div>
    </div>
    <!-- mg_end year -->

    <!-- mg_start column -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="column"><?php _t(ucfirst("column")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="column" class="form-control" id="column" placeholder="column"  value="" >
</div>
    </div>
    <!-- mg_end column -->

    <!-- mg_start value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t(ucfirst("value")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value"   value="" >
</div>
    </div>
    <!-- mg_end value -->

    <!-- mg_start formule -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="formule"><?php _t(ucfirst("formule")); ?> </label>
        <div class="col-sm-8">            <textarea name="formule" class="form-control" id="formule" placeholder="formule - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . formule . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end formule -->

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
