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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="veh_driver_licenses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start category -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t(ucfirst("category")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="category" class="form-control" id="category" placeholder="category"  required=""  value="" >
</div>
    </div>
    <!-- mg_end category -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
</div>
    </div>
    <!-- mg_end description -->

    <!-- mg_start min_age -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="min_age"><?php _t(ucfirst("min_age")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="min_age" class="form-control" id="min_age" placeholder="min_age"  required=""  value="" >
</div>
    </div>
    <!-- mg_end min_age -->

    <!-- mg_start max_weight -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="max_weight"><?php _t(ucfirst("max_weight")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="max_weight" class="form-control" id="max_weight" placeholder="max_weight"   value="" >
</div>
    </div>
    <!-- mg_end max_weight -->

    <!-- mg_start max_passengers -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="max_passengers"><?php _t(ucfirst("max_passengers")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="max_passengers" class="form-control" id="max_passengers" placeholder="max_passengers"   value="" >
</div>
    </div>
    <!-- mg_end max_passengers -->

    <!-- mg_start notes -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t(ucfirst("notes")); ?> </label>
        <div class="col-sm-8">            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end notes -->

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
