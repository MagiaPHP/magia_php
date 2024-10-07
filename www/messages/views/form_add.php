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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="messages">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  value="" >
</div>
    </div>
    <!-- mg_end type -->

    <!-- mg_start message -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="message"><?php _t(ucfirst("message")); ?> </label>
        <div class="col-sm-8">            <textarea name="message" class="form-control" id="message" placeholder="message - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . message . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end message -->

    <!-- mg_start url_action -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_action"><?php _t(ucfirst("url_action")); ?> </label>
        <div class="col-sm-8">            <textarea name="url_action" class="form-control" id="url_action" placeholder="url_action - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url_action . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end url_action -->

    <!-- mg_start url_label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="url_label"><?php _t(ucfirst("url_label")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="url_label" class="form-control" id="url_label" placeholder="url_label"  value="" >
</div>
    </div>
    <!-- mg_end url_label -->

    <!-- mg_start controller -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t(ucfirst("controller")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="" >
</div>
    </div>
    <!-- mg_end controller -->

    <!-- mg_start doc_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t(ucfirst("doc_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id"   value="" >
</div>
    </div>
    <!-- mg_end doc_id -->

    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start rol -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="rol"><?php _t(ucfirst("rol")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="rol" class="form-control" id="rol" placeholder="rol"  value="" >
</div>
    </div>
    <!-- mg_end rol -->

    <!-- mg_start date_start -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t(ucfirst("date_start")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start"  value="" >
</div>
    </div>
    <!-- mg_end date_start -->

    <!-- mg_start date_end -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t(ucfirst("date_end")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end"  value="" >
</div>
    </div>
    <!-- mg_end date_end -->

    <!-- mg_start date_registre -->
    <!-- mg_start read_by -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="read_by"><?php _t(ucfirst("read_by")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="read_by" class="form-control" id="read_by" placeholder="read_by"   value="" >
</div>
    </div>
    <!-- mg_end read_by -->

    <!-- mg_start is_logued -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="is_logued"><?php _t(ucfirst("is_logued")); ?> </label>
        <div class="col-sm-8">            <select name="is_logued" class="form-control" id="is_logued" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end is_logued -->

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
