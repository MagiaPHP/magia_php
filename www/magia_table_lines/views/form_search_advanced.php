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
# Fecha de creacion del documento: 2024-08-31 17:08:05 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="magia_table_lines">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # table_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="table_id"><?php _t("Table_id"); ?></label>
        <div class="col-sm-8">
               <select name="table_id" class="form-control selectpicker" id="table_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_tables_select("id", array("id"), $magia_table_lines->getTable_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /table_id ?>

    <?php # header_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_icon"><?php _t("Header_icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="header_icon" class="form-control" id="header_icon" placeholder="header_icon"  value="" >
        </div>	
    </div>
    <?php # /header_icon ?>

    <?php # header_pre_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_pre_label"><?php _t("Header_pre_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="header_pre_label" class="form-control" id="header_pre_label" placeholder="header_pre_label"  value="" >
        </div>	
    </div>
    <?php # /header_pre_label ?>

    <?php # header_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_label"><?php _t("Header_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="header_label" class="form-control" id="header_label" placeholder="header_label"  value="" >
        </div>	
    </div>
    <?php # /header_label ?>

    <?php # header_url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_url"><?php _t("Header_url"); ?></label>
        <div class="col-sm-8">
            <textarea name="header_url" class="form-control" id="header_url" placeholder="header_url - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . header_url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /header_url ?>

    <?php # header_post_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_post_label"><?php _t("Header_post_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="header_post_label" class="form-control" id="header_post_label" placeholder="header_post_label"  value="" >
        </div>	
    </div>
    <?php # /header_post_label ?>

    <?php # body_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_icon"><?php _t("Body_icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="body_icon" class="form-control" id="body_icon" placeholder="body_icon"  value="" >
        </div>	
    </div>
    <?php # /body_icon ?>

    <?php # body_pre_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_pre_label"><?php _t("Body_pre_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="body_pre_label" class="form-control" id="body_pre_label" placeholder="body_pre_label"  value="" >
        </div>	
    </div>
    <?php # /body_pre_label ?>

    <?php # body_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_label"><?php _t("Body_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="body_label" class="form-control" id="body_label" placeholder="body_label"  value="" >
        </div>	
    </div>
    <?php # /body_label ?>

    <?php # body_post_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_post_label"><?php _t("Body_post_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="body_post_label" class="form-control" id="body_post_label" placeholder="body_post_label"  value="" >
        </div>	
    </div>
    <?php # /body_post_label ?>

    <?php # footer_icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_icon"><?php _t("Footer_icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="footer_icon" class="form-control" id="footer_icon" placeholder="footer_icon"  value="" >
        </div>	
    </div>
    <?php # /footer_icon ?>

    <?php # footer_pre_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_pre_label"><?php _t("Footer_pre_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="footer_pre_label" class="form-control" id="footer_pre_label" placeholder="footer_pre_label"  value="" >
        </div>	
    </div>
    <?php # /footer_pre_label ?>

    <?php # footer_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_label"><?php _t("Footer_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="footer_label" class="form-control" id="footer_label" placeholder="footer_label"  value="" >
        </div>	
    </div>
    <?php # /footer_label ?>

    <?php # footer_post_label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_post_label"><?php _t("Footer_post_label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="footer_post_label" class="form-control" id="footer_post_label" placeholder="footer_post_label"  value="" >
        </div>	
    </div>
    <?php # /footer_post_label ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # permission ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="permission"><?php _t("Permission"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="permission" class="form-control" id="permission" placeholder="permission"  required=""  value="" >
        </div>	
    </div>
    <?php # /permission ?>

    <?php # align ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="align"><?php _t("Align"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="align" class="form-control" id="align" placeholder="align"  required=""  value="" >
        </div>	
    </div>
    <?php # /align ?>

    <?php # show ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="show"><?php _t("Show"); ?></label>
        <div class="col-sm-8">
            <select name="show" class="form-control" id="show" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /show ?>

    <?php # translate ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="translate"><?php _t("Translate"); ?></label>
        <div class="col-sm-8">
            <select name="translate" class="form-control" id="translate" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /translate ?>

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
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
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
