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
# Fecha de creacion del documento: 2024-09-22 18:09:01 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="docu">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start controllers -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controllers"><?php _t(ucfirst("controllers")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="controllers" class="form-control" id="controllers" placeholder="controllers"  required=""  value="" >
</div>
    </div>
    <!-- mg_end controllers -->

    <!-- mg_start action -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t(ucfirst("action")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="action" class="form-control" id="action" placeholder="action"  required=""  value="" >
</div>
    </div>
    <!-- mg_end action -->

    <!-- mg_start language -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="language"><?php _t(ucfirst("language")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="language" class="form-control" id="language" placeholder="language"  required=""  value="" >
</div>
    </div>
    <!-- mg_end language -->

    <!-- mg_start father_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t(ucfirst("father_id")); ?> </label>
        <div class="col-sm-8">               <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                docu_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end father_id -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="" >
</div>
    </div>
    <!-- mg_end title -->

    <!-- mg_start post -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="post"><?php _t(ucfirst("post")); ?> </label>
        <div class="col-sm-8">            <textarea name="post" class="form-control" id="post" placeholder="post - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . post . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end post -->

    <!-- mg_start h -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="h"><?php _t(ucfirst("h")); ?> </label>
        <div class="col-sm-8">            <select name="h" class="form-control" id="h" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
                </select>
</div>
    </div>
    <!-- mg_end h -->

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
