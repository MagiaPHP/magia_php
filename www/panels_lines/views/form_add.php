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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="panels_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start panel_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="panel_id"><?php _t(ucfirst("panel_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="panel_id" class="form-control selectpicker" id="panel_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                panels_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end panel_id -->

    <!-- mg_start icon -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t(ucfirst("icon")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon"  value="" >
</div>
    </div>
    <!-- mg_end icon -->

    <!-- mg_start label -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t(ucfirst("label")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="label" class="form-control" id="label" placeholder="label"  required=""  value="" >
</div>
    </div>
    <!-- mg_end label -->

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

    <!-- mg_start url -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t(ucfirst("url")); ?> </label>
        <div class="col-sm-8">            <textarea name="url" class="form-control" id="url" placeholder="url - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end url -->

    <!-- mg_start badge -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="badge"><?php _t(ucfirst("badge")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="badge" class="form-control" id="badge" placeholder="badge"  value="" >
</div>
    </div>
    <!-- mg_end badge -->

    <!-- mg_start controller -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t(ucfirst("controller")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="" >
</div>
    </div>
    <!-- mg_end controller -->

    <!-- mg_start action -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t(ucfirst("action")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="action" class="form-control" id="action" placeholder="action"  value="" >
</div>
    </div>
    <!-- mg_end action -->

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
