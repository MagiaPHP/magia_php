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
# Fecha de creacion del documento: 2024-08-31 17:08:35 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia_forms_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start mg_form_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_form_id"><?php _t(ucfirst("mg_form_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="mg_form_id" class="form-control selectpicker" id="mg_form_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_forms_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end mg_form_id -->

    <!-- mg_start mg_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_type"><?php _t(ucfirst("mg_type")); ?>  * </label>
        <div class="col-sm-8">               <select name="mg_type" class="form-control selectpicker" id="mg_type" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_forms_types_select("type", array("type"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end mg_type -->

    <!-- mg_start mg_external_table -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_external_table"><?php _t(ucfirst("mg_external_table")); ?> </label>
        <div class="col-sm-8">            <textarea name="mg_external_table" class="form-control" id="mg_external_table" placeholder="mg_external_table - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_external_table . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end mg_external_table -->

    <!-- mg_start mg_external_col -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_external_col"><?php _t(ucfirst("mg_external_col")); ?> </label>
        <div class="col-sm-8">            <textarea name="mg_external_col" class="form-control" id="mg_external_col" placeholder="mg_external_col - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_external_col . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end mg_external_col -->

    <!-- mg_start mg_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_label"><?php _t(ucfirst("mg_label")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="mg_label" class="form-control" id="mg_label" placeholder="mg_label"  required=""  value="" >
</div>
    </div>
    <!-- mg_end mg_label -->

    <!-- mg_start mg_help_text -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_help_text"><?php _t(ucfirst("mg_help_text")); ?> </label>
        <div class="col-sm-8">            <textarea name="mg_help_text" class="form-control" id="mg_help_text" placeholder="mg_help_text - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_help_text . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end mg_help_text -->

    <!-- mg_start mg_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_name"><?php _t(ucfirst("mg_name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="mg_name" class="form-control" id="mg_name" placeholder="mg_name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end mg_name -->

    <!-- mg_start mg_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_id"><?php _t(ucfirst("mg_id")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="mg_id" class="form-control" id="mg_id" placeholder="mg_id"  value="" >
</div>
    </div>
    <!-- mg_end mg_id -->

    <!-- mg_start mg_placeholder -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_placeholder"><?php _t(ucfirst("mg_placeholder")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="mg_placeholder" class="form-control" id="mg_placeholder" placeholder="mg_placeholder"  value="" >
</div>
    </div>
    <!-- mg_end mg_placeholder -->

    <!-- mg_start mg_value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_value"><?php _t(ucfirst("mg_value")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="mg_value" class="form-control" id="mg_value" placeholder="mg_value"  value="" >
</div>
    </div>
    <!-- mg_end mg_value -->

    <!-- mg_start mg_class -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_class"><?php _t(ucfirst("mg_class")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="mg_class" class="form-control" id="mg_class" placeholder="mg_class"  value="" >
</div>
    </div>
    <!-- mg_end mg_class -->

    <!-- mg_start mg_required -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_required"><?php _t(ucfirst("mg_required")); ?> </label>
        <div class="col-sm-8">            <select name="mg_required" class="form-control" id="mg_required" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end mg_required -->

    <!-- mg_start mg_disabled -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_disabled"><?php _t(ucfirst("mg_disabled")); ?> </label>
        <div class="col-sm-8">            <select name="mg_disabled" class="form-control" id="mg_disabled" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end mg_disabled -->

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
