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
# Fecha de creacion del documento: 2024-08-31 17:08:04 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia_table_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start table_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="table_id"><?php _t(ucfirst("table_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="table_id" class="form-control selectpicker" id="table_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                magia_tables_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end table_id -->

    <!-- mg_start header_icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_icon"><?php _t(ucfirst("header_icon")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="header_icon" class="form-control" id="header_icon" placeholder="header_icon"  value="" >
</div>
    </div>
    <!-- mg_end header_icon -->

    <!-- mg_start header_pre_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_pre_label"><?php _t(ucfirst("header_pre_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="header_pre_label" class="form-control" id="header_pre_label" placeholder="header_pre_label"  value="" >
</div>
    </div>
    <!-- mg_end header_pre_label -->

    <!-- mg_start header_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_label"><?php _t(ucfirst("header_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="header_label" class="form-control" id="header_label" placeholder="header_label"  value="" >
</div>
    </div>
    <!-- mg_end header_label -->

    <!-- mg_start header_url -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_url"><?php _t(ucfirst("header_url")); ?> </label>
        <div class="col-sm-8">            <textarea name="header_url" class="form-control" id="header_url" placeholder="header_url - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . header_url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end header_url -->

    <!-- mg_start header_post_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="header_post_label"><?php _t(ucfirst("header_post_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="header_post_label" class="form-control" id="header_post_label" placeholder="header_post_label"  value="" >
</div>
    </div>
    <!-- mg_end header_post_label -->

    <!-- mg_start body_icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_icon"><?php _t(ucfirst("body_icon")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="body_icon" class="form-control" id="body_icon" placeholder="body_icon"  value="" >
</div>
    </div>
    <!-- mg_end body_icon -->

    <!-- mg_start body_pre_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_pre_label"><?php _t(ucfirst("body_pre_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="body_pre_label" class="form-control" id="body_pre_label" placeholder="body_pre_label"  value="" >
</div>
    </div>
    <!-- mg_end body_pre_label -->

    <!-- mg_start body_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_label"><?php _t(ucfirst("body_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="body_label" class="form-control" id="body_label" placeholder="body_label"  value="" >
</div>
    </div>
    <!-- mg_end body_label -->

    <!-- mg_start body_post_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body_post_label"><?php _t(ucfirst("body_post_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="body_post_label" class="form-control" id="body_post_label" placeholder="body_post_label"  value="" >
</div>
    </div>
    <!-- mg_end body_post_label -->

    <!-- mg_start footer_icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_icon"><?php _t(ucfirst("footer_icon")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="footer_icon" class="form-control" id="footer_icon" placeholder="footer_icon"  value="" >
</div>
    </div>
    <!-- mg_end footer_icon -->

    <!-- mg_start footer_pre_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_pre_label"><?php _t(ucfirst("footer_pre_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="footer_pre_label" class="form-control" id="footer_pre_label" placeholder="footer_pre_label"  value="" >
</div>
    </div>
    <!-- mg_end footer_pre_label -->

    <!-- mg_start footer_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_label"><?php _t(ucfirst("footer_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="footer_label" class="form-control" id="footer_label" placeholder="footer_label"  value="" >
</div>
    </div>
    <!-- mg_end footer_label -->

    <!-- mg_start footer_post_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="footer_post_label"><?php _t(ucfirst("footer_post_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="footer_post_label" class="form-control" id="footer_post_label" placeholder="footer_post_label"  value="" >
</div>
    </div>
    <!-- mg_end footer_post_label -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?> </label>
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

    <!-- mg_start permission -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="permission"><?php _t(ucfirst("permission")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="permission" class="form-control" id="permission" placeholder="permission"  required=""  value="0000" >
</div>
    </div>
    <!-- mg_end permission -->

    <!-- mg_start align -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="align"><?php _t(ucfirst("align")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="align" class="form-control" id="align" placeholder="align"  required=""  value="L" >
</div>
    </div>
    <!-- mg_end align -->

    <!-- mg_start show -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="show"><?php _t(ucfirst("show")); ?>  * </label>
        <div class="col-sm-8">            <select name="show" class="form-control" id="show" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end show -->

    <!-- mg_start translate -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="translate"><?php _t(ucfirst("translate")); ?>  * </label>
        <div class="col-sm-8">            <select name="translate" class="form-control" id="translate" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end translate -->

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
