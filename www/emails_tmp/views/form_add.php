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
# Fecha de creacion del documento: 2024-09-04 08:09:38 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="emails_tmp">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="contact_id" class="form-control" id="contact_id" placeholder="contact_id"   value="" >
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start controller -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t(ucfirst("controller")); ?> </label>
        <div class="col-sm-8">               <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                controllers_select("controller", array("controller"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end controller -->

    <!-- mg_start tmp -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tmp"><?php _t(ucfirst("tmp")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="tmp" class="form-control" id="tmp" placeholder="tmp"  value="" >
</div>
    </div>
    <!-- mg_end tmp -->

    <!-- mg_start body -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="body"><?php _t(ucfirst("body")); ?> </label>
        <div class="col-sm-8">            <textarea name="body" class="form-control" id="body" placeholder="body - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . body . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end body -->

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
