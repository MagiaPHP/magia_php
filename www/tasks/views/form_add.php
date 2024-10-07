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
# Fecha de creacion del documento: 2024-09-26 17:09:07 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="tasks">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start category_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_id"><?php _t(ucfirst("category_id")); ?> </label>
        <div class="col-sm-8">               <select name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                tasks_categories_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end category_id -->

    <!-- mg_start contact_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_id"><?php _t(ucfirst("contact_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="contact_id" class="form-control selectpicker" id="contact_id" data-live-search="true" >
                        
                <?php contacts_select("id", array("name", "lastname"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end contact_id -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="title" class="form-control" id="title" placeholder="title"  required=""  value="" >
</div>
    </div>
    <!-- mg_end title -->

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

    <!-- mg_start doc_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="doc_id"><?php _t(ucfirst("doc_id")); ?> </label>
        <div class="col-sm-8">            <input type="number" step="any" name="doc_id" class="form-control" id="doc_id" placeholder="doc_id"   value="" >
</div>
    </div>
    <!-- mg_end doc_id -->

    <!-- mg_start date_registre -->
    <!-- mg_start date_update -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_update"><?php _t(ucfirst("date_update")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="date_update" class="form-control" id="date_update" placeholder="date_update"  value="" >
</div>
    </div>
    <!-- mg_end date_update -->

    <!-- mg_start color -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="color"><?php _t(ucfirst("color")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="color" class="form-control" id="color" placeholder="color"  value="" >
</div>
    </div>
    <!-- mg_end color -->

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
