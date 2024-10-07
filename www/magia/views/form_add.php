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
# Fecha de creacion del documento: 2024-08-31 17:08:46 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start form_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="form_id"><?php _t(ucfirst("form_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="form_id" class="form-control" id="form_id" placeholder="form_id"   value="" >
</div>
    </div>
    <!-- mg_end form_id -->

    <!-- mg_start m_db -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_db"><?php _t(ucfirst("m_db")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_db" class="form-control" id="m_db" placeholder="m_db"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_db -->

    <!-- mg_start m_table -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table"><?php _t(ucfirst("m_table")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_table" class="form-control" id="m_table" placeholder="m_table"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_table -->

    <!-- mg_start m_field_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_field_name"><?php _t(ucfirst("m_field_name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_field_name" class="form-control" id="m_field_name" placeholder="m_field_name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_field_name -->

    <!-- mg_start m_action -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_action"><?php _t(ucfirst("m_action")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_action" class="form-control" id="m_action" placeholder="m_action"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_action -->

    <!-- mg_start m_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_label"><?php _t(ucfirst("m_label")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_label" class="form-control" id="m_label" placeholder="m_label"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_label -->

    <!-- mg_start m_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_type"><?php _t(ucfirst("m_type")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_type" class="form-control" id="m_type" placeholder="m_type"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_type -->

    <!-- mg_start m_class -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_class"><?php _t(ucfirst("m_class")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_class" class="form-control" id="m_class" placeholder="m_class"  required=""  value="form-control" >
</div>
    </div>
    <!-- mg_end m_class -->

    <!-- mg_start m_table_external -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table_external"><?php _t(ucfirst("m_table_external")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_table_external" class="form-control" id="m_table_external" placeholder="m_table_external"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_table_external -->

    <!-- mg_start m_col_external -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_col_external"><?php _t(ucfirst("m_col_external")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_col_external" class="form-control" id="m_col_external" placeholder="m_col_external"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_col_external -->

    <!-- mg_start m_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_name"><?php _t(ucfirst("m_name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_name" class="form-control" id="m_name" placeholder="m_name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_name -->

    <!-- mg_start m_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_id"><?php _t(ucfirst("m_id")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_id" class="form-control" id="m_id" placeholder="m_id"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_id -->

    <!-- mg_start m_placeholder -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_placeholder"><?php _t(ucfirst("m_placeholder")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_placeholder" class="form-control" id="m_placeholder" placeholder="m_placeholder"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_placeholder -->

    <!-- mg_start m_value -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_value"><?php _t(ucfirst("m_value")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="m_value" class="form-control" id="m_value" placeholder="m_value"  required=""  value="" >
</div>
    </div>
    <!-- mg_end m_value -->

    <!-- mg_start m_only_read -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_only_read"><?php _t(ucfirst("m_only_read")); ?> </label>
        <div class="col-sm-8">            <select name="m_only_read" class="form-control" id="m_only_read" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end m_only_read -->

    <!-- mg_start m_mandatory -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_mandatory"><?php _t(ucfirst("m_mandatory")); ?> </label>
        <div class="col-sm-8">            <select name="m_mandatory" class="form-control" id="m_mandatory" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end m_mandatory -->

    <!-- mg_start m_selected -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_selected"><?php _t(ucfirst("m_selected")); ?> </label>
        <div class="col-sm-8">            <select name="m_selected" class="form-control" id="m_selected" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end m_selected -->

    <!-- mg_start m_disabled -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_disabled"><?php _t(ucfirst("m_disabled")); ?> </label>
        <div class="col-sm-8">            <select name="m_disabled" class="form-control" id="m_disabled" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end m_disabled -->

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
