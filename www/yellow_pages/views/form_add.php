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
# Fecha de creacion del documento: 2024-10-07 10:10:03 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="yellow_pages">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t(ucfirst("label")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="label" class="form-control" id="label" placeholder="label"  required=""  value="" >
<p class="help-block"><?php echo _tr("Add short description"); ?></p></div>
    </div>
    <!-- mg_end label -->

    <!-- mg_start url -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t(ucfirst("url")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="url" class="form-control" id="url" placeholder="url - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
<p class="help-block"><?php echo _tr("https://"); ?></p></div>
    </div>
    <!-- mg_end url -->

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
<p class="help-block"><?php echo _tr("Add long description"); ?></p></div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start category -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t(ucfirst("category")); ?>  * </label>
        <div class="col-sm-8">               <select name="category" class="form-control selectpicker" id="category" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                yellow_pages_categories_select("category", array("category"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end category -->

    <!-- mg_start target -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t(ucfirst("target")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="target" class="form-control" id="target" placeholder="target"  value="_new" >
</div>
    </div>
    <!-- mg_end target -->

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
