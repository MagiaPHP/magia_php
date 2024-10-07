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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $magia_forms_lines->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # mg_form_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_form_id"><?php _t("Mg_form_id"); ?></label>
        <div class="col-sm-8">
               <select name="mg_form_id" class="form-control selectpicker" id="mg_form_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_forms_select("id", array("id"), $magia_forms_lines->getMg_form_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /mg_form_id ?>

    <?php # mg_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_type"><?php _t("Mg_type"); ?></label>
        <div class="col-sm-8">
               <select name="mg_type" class="form-control selectpicker" id="mg_type" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_forms_types_select("type", array("type"), $magia_forms_lines->getMg_type() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /mg_type ?>

    <?php # mg_external_table ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_external_table"><?php _t("Mg_external_table"); ?></label>
        <div class="col-sm-8">
            <textarea name="mg_external_table" class="form-control" id="mg_external_table" placeholder="mg_external_table - textarea" ><?php echo $magia_forms_lines->getMg_external_table(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_external_table . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /mg_external_table ?>

    <?php # mg_external_col ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_external_col"><?php _t("Mg_external_col"); ?></label>
        <div class="col-sm-8">
            <textarea name="mg_external_col" class="form-control" id="mg_external_col" placeholder="mg_external_col - textarea" ><?php echo $magia_forms_lines->getMg_external_col(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_external_col . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /mg_external_col ?>

    <?php # mg_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_label"><?php _t("Mg_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_label" class="form-control" id="mg_label" placeholder="mg_label"  required=""  value="<?php echo $magia_forms_lines->getMg_label(); ?>" >
        </div>	
    </div>
    <?php # /mg_label ?>

    <?php # mg_help_text ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_help_text"><?php _t("Mg_help_text"); ?></label>
        <div class="col-sm-8">
            <textarea name="mg_help_text" class="form-control" id="mg_help_text" placeholder="mg_help_text - textarea" ><?php echo $magia_forms_lines->getMg_help_text(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . mg_help_text . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /mg_help_text ?>

    <?php # mg_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_name"><?php _t("Mg_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_name" class="form-control" id="mg_name" placeholder="mg_name"  required=""  value="<?php echo $magia_forms_lines->getMg_name(); ?>" >
        </div>	
    </div>
    <?php # /mg_name ?>

    <?php # mg_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_id"><?php _t("Mg_id"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_id" class="form-control" id="mg_id" placeholder="mg_id"  value="<?php echo $magia_forms_lines->getMg_id(); ?>" >
        </div>	
    </div>
    <?php # /mg_id ?>

    <?php # mg_placeholder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_placeholder"><?php _t("Mg_placeholder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_placeholder" class="form-control" id="mg_placeholder" placeholder="mg_placeholder"  value="<?php echo $magia_forms_lines->getMg_placeholder(); ?>" >
        </div>	
    </div>
    <?php # /mg_placeholder ?>

    <?php # mg_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_value"><?php _t("Mg_value"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_value" class="form-control" id="mg_value" placeholder="mg_value"  value="<?php echo $magia_forms_lines->getMg_value(); ?>" >
        </div>	
    </div>
    <?php # /mg_value ?>

    <?php # mg_class ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_class"><?php _t("Mg_class"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="mg_class" class="form-control" id="mg_class" placeholder="mg_class"  value="<?php echo $magia_forms_lines->getMg_class(); ?>" >
        </div>	
    </div>
    <?php # /mg_class ?>

    <?php # mg_required ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_required"><?php _t("Mg_required"); ?></label>
        <div class="col-sm-8">
            <select name="mg_required" class="form-control" id="mg_required" >                
                <option value="1" <?php echo ($magia_forms_lines->getMg_required() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getMg_required() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /mg_required ?>

    <?php # mg_disabled ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="mg_disabled"><?php _t("Mg_disabled"); ?></label>
        <div class="col-sm-8">
            <select name="mg_disabled" class="form-control" id="mg_disabled" >                
                <option value="1" <?php echo ($magia_forms_lines->getMg_disabled() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getMg_disabled() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /mg_disabled ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $magia_forms_lines->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($magia_forms_lines->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia_forms_lines->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

