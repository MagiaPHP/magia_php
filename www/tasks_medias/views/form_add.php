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
# Fecha de creacion del documento: 2024-09-26 17:09:18 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks_medias">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start task_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="task_id"><?php _t(ucfirst("task_id")); ?> </label>
        <div class="col-sm-8">               <select name="task_id" class="form-control selectpicker" id="task_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end task_id -->

    <!-- mg_start type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="type"><?php _t(ucfirst("type")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="type" class="form-control" id="type" placeholder="type"  required=""  value="" >
</div>
    </div>
    <!-- mg_end type -->

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
</div>
    </div>
    <!-- mg_end url -->

    <!-- mg_start description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t(ucfirst("description")); ?>  * </label>
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
