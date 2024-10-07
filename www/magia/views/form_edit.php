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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $magia->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

        <?php # form_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="form_id"><?php _t("Form_id"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="form_id" class="form-control" id="form_id" placeholder="form_id"   value="<?php echo $magia->getForm_id(); ?>" >
        </div>	
    </div>
    <?php # /form_id ?>

    <?php # m_db ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_db"><?php _t("M_db"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_db" class="form-control" id="m_db" placeholder="m_db"  required=""  value="<?php echo $magia->getM_db(); ?>" >
        </div>	
    </div>
    <?php # /m_db ?>

    <?php # m_table ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table"><?php _t("M_table"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_table" class="form-control" id="m_table" placeholder="m_table"  required=""  value="<?php echo $magia->getM_table(); ?>" >
        </div>	
    </div>
    <?php # /m_table ?>

    <?php # m_field_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_field_name"><?php _t("M_field_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_field_name" class="form-control" id="m_field_name" placeholder="m_field_name"  required=""  value="<?php echo $magia->getM_field_name(); ?>" >
        </div>	
    </div>
    <?php # /m_field_name ?>

    <?php # m_action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_action"><?php _t("M_action"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_action" class="form-control" id="m_action" placeholder="m_action"  required=""  value="<?php echo $magia->getM_action(); ?>" >
        </div>	
    </div>
    <?php # /m_action ?>

    <?php # m_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_label"><?php _t("M_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_label" class="form-control" id="m_label" placeholder="m_label"  required=""  value="<?php echo $magia->getM_label(); ?>" >
        </div>	
    </div>
    <?php # /m_label ?>

    <?php # m_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_type"><?php _t("M_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_type" class="form-control" id="m_type" placeholder="m_type"  required=""  value="<?php echo $magia->getM_type(); ?>" >
        </div>	
    </div>
    <?php # /m_type ?>

    <?php # m_class ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_class"><?php _t("M_class"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_class" class="form-control" id="m_class" placeholder="m_class"  required=""  value="<?php echo $magia->getM_class(); ?>" >
        </div>	
    </div>
    <?php # /m_class ?>

    <?php # m_table_external ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table_external"><?php _t("M_table_external"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_table_external" class="form-control" id="m_table_external" placeholder="m_table_external"  required=""  value="<?php echo $magia->getM_table_external(); ?>" >
        </div>	
    </div>
    <?php # /m_table_external ?>

    <?php # m_col_external ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_col_external"><?php _t("M_col_external"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_col_external" class="form-control" id="m_col_external" placeholder="m_col_external"  required=""  value="<?php echo $magia->getM_col_external(); ?>" >
        </div>	
    </div>
    <?php # /m_col_external ?>

    <?php # m_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_name"><?php _t("M_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_name" class="form-control" id="m_name" placeholder="m_name"  required=""  value="<?php echo $magia->getM_name(); ?>" >
        </div>	
    </div>
    <?php # /m_name ?>

    <?php # m_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_id"><?php _t("M_id"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_id" class="form-control" id="m_id" placeholder="m_id"  required=""  value="<?php echo $magia->getM_id(); ?>" >
        </div>	
    </div>
    <?php # /m_id ?>

    <?php # m_placeholder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_placeholder"><?php _t("M_placeholder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_placeholder" class="form-control" id="m_placeholder" placeholder="m_placeholder"  required=""  value="<?php echo $magia->getM_placeholder(); ?>" >
        </div>	
    </div>
    <?php # /m_placeholder ?>

    <?php # m_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_value"><?php _t("M_value"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_value" class="form-control" id="m_value" placeholder="m_value"  required=""  value="<?php echo $magia->getM_value(); ?>" >
        </div>	
    </div>
    <?php # /m_value ?>

    <?php # m_only_read ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_only_read"><?php _t("M_only_read"); ?></label>
        <div class="col-sm-8">
            <select name="m_only_read" class="form-control" id="m_only_read" >                
                <option value="1" <?php echo ($magia->getM_only_read() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia->getM_only_read() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /m_only_read ?>

    <?php # m_mandatory ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_mandatory"><?php _t("M_mandatory"); ?></label>
        <div class="col-sm-8">
            <select name="m_mandatory" class="form-control" id="m_mandatory" >                
                <option value="1" <?php echo ($magia->getM_mandatory() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia->getM_mandatory() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /m_mandatory ?>

    <?php # m_selected ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_selected"><?php _t("M_selected"); ?></label>
        <div class="col-sm-8">
            <select name="m_selected" class="form-control" id="m_selected" >                
                <option value="1" <?php echo ($magia->getM_selected() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia->getM_selected() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /m_selected ?>

    <?php # m_disabled ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_disabled"><?php _t("M_disabled"); ?></label>
        <div class="col-sm-8">
            <select name="m_disabled" class="form-control" id="m_disabled" >                
                <option value="1" <?php echo ($magia->getM_disabled() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia->getM_disabled() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /m_disabled ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $magia->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($magia->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($magia->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

