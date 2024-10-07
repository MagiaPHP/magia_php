<?php
# MagiaPHP 
# file date creation: 2024-02-11 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $arg["redi"]; ?>">

    <?php # form_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="form_id"><?php _t("Form_id"); ?></label>
        <div class="col-sm-8">
            <select name="form_id" class="form-control selectpicker" id="form_id" data-live-search="true" >
                <?php forms_select("id", "id", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /form_id ?>

    <?php # m_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_label"><?php _t("M_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_label" class="form-control" id="m_label" placeholder="m_label" value="" >
        </div>	
    </div>
    <?php # /m_label ?>

    <?php # m_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_type"><?php _t("M_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_type" class="form-control" id="m_type" placeholder="m_type" value="text" >
        </div>	
    </div>
    <?php # /m_type ?>

    <?php # m_class ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_class"><?php _t("M_class"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_class" class="form-control" id="m_class" placeholder="m_class" value="form-control" >
        </div>	
    </div>
    <?php # /m_class ?>

    <?php # m_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_name"><?php _t("M_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_name" class="form-control" id="m_name" placeholder="m_name" value="" >
        </div>	
    </div>
    <?php # /m_name ?>

    <?php # m_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_id"><?php _t("M_id"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_id" class="form-control" id="m_id" placeholder="m_id" value="" >
        </div>	
    </div>
    <?php # /m_id ?>

    <?php # m_placeholder ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_placeholder"><?php _t("M_placeholder"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_placeholder" class="form-control" id="m_placeholder" placeholder="m_placeholder" value="" >
        </div>	
    </div>
    <?php # /m_placeholder ?>

    <?php # m_value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_value"><?php _t("M_value"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_value" class="form-control" id="m_value" placeholder="m_value" value="" >
        </div>	
    </div>
    <?php # /m_value ?>

    <?php # m_only_read ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_only_read"><?php _t("M_only_read"); ?></label>
        <div class="col-sm-8">
            <select name="m_only_read" class="form-control" id="m_only_read" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /m_only_read ?>

    <?php # m_mandatory ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_mandatory"><?php _t("M_mandatory"); ?></label>
        <div class="col-sm-8">
            <select name="m_mandatory" class="form-control" id="m_mandatory" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /m_mandatory ?>

    <?php # m_selected ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_selected"><?php _t("M_selected"); ?></label>
        <div class="col-sm-8">
            <select name="m_selected" class="form-control" id="m_selected" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /m_selected ?>

    <?php # m_disabled ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_disabled"><?php _t("M_disabled"); ?></label>
        <div class="col-sm-8">
            <select name="m_disabled" class="form-control" id="m_disabled" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /m_disabled ?>

    <?php # m_table_external ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_table_external"><?php _t("M_table_external"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_table_external" class="form-control" id="m_table_external" placeholder="m_table_external" value="" >
        </div>	
    </div>
    <?php # /m_table_external ?>

    <?php # m_col_external ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_col_external"><?php _t("M_col_external"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_col_external" class="form-control" id="m_col_external" placeholder="m_col_external" value="" >
        </div>	
    </div>
    <?php # /m_col_external ?>

    <?php # m_label_external ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_label_external"><?php _t("M_label_external"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="m_label_external" class="form-control" id="m_label_external" placeholder="m_label_external" value="" >
        </div>	
    </div>
    <?php # /m_label_external ?>

    <?php # m_options_values ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="m_options_values"><?php _t("M_options_values"); ?></label>
        <div class="col-sm-8">
            <textarea name="m_options_values" class="form-control" id="m_options_values" placeholder="m_options_values - textarea" ></textarea>
        </div>	
    </div>
    <?php # /m_options_values ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
