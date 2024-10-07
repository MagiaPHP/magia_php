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
# Fecha de creacion del documento: 2024-09-21 12:09:54 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start payroll_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="payroll_id"><?php _t(ucfirst("payroll_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="payroll_id" class="form-control selectpicker" id="payroll_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_payroll_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end payroll_id -->

    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?> </label>
        <div class="col-sm-8">               <select name="code" class="form-control selectpicker" id="code" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_payroll_items_select("code", array("code"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start in_out -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_out"><?php _t(ucfirst("in_out")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="in_out" class="form-control" id="in_out" placeholder="in_out"  value="" >
</div>
    </div>
    <!-- mg_end in_out -->

    <!-- mg_start days -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t(ucfirst("days")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days"   value="" >
</div>
    </div>
    <!-- mg_end days -->

    <!-- mg_start quantity -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t(ucfirst("quantity")); ?> </label>
        <div class="col-sm-8">            <select name="quantity" class="form-control" id="quantity" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end quantity -->

    <!-- mg_start value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t(ucfirst("value")); ?>  * </label>
        <div class="col-sm-8">            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value"   required=""  value="" >
</div>
    </div>
    <!-- mg_end value -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start formula -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="formula"><?php _t(ucfirst("formula")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="formula" class="form-control" id="formula" placeholder="formula"  value="" >
</div>
    </div>
    <!-- mg_end formula -->

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
