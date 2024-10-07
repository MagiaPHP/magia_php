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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_family_dependents">
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

    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

    <!-- mg_start lastname -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="lastname"><?php _t(ucfirst("lastname")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname"  required=""  value="" >
</div>
    </div>
    <!-- mg_end lastname -->

    <!-- mg_start birthday -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="birthday"><?php _t(ucfirst("birthday")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="birthday" class="form-control" id="birthday" placeholder="birthday"  value="" >
</div>
    </div>
    <!-- mg_end birthday -->

    <!-- mg_start relation -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="relation"><?php _t(ucfirst("relation")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="relation" class="form-control" id="relation" placeholder="relation"  required=""  value="" >
</div>
    </div>
    <!-- mg_end relation -->

    <!-- mg_start in_charge -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_charge"><?php _t(ucfirst("in_charge")); ?> </label>
        <div class="col-sm-8">            <select name="in_charge" class="form-control" id="in_charge" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end in_charge -->

    <!-- mg_start handicap -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="handicap"><?php _t(ucfirst("handicap")); ?> </label>
        <div class="col-sm-8">            <select name="handicap" class="form-control" id="handicap" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end handicap -->

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
