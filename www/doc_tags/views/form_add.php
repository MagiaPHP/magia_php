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
# Fecha de creacion del documento: 2024-09-04 08:09:09 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_tags">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start controller -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t(ucfirst("controller")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  required=""  value="" >
</div>
    </div>
    <!-- mg_end controller -->

    <!-- mg_start tag -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="tag"><?php _t(ucfirst("tag")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="tag" class="form-control" id="tag" placeholder="tag"  required=""  value="" >
</div>
    </div>
    <!-- mg_end tag -->

    <!-- mg_start replace_by -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="replace_by"><?php _t(ucfirst("replace_by")); ?> </label>
        <div class="col-sm-8">            <textarea name="replace_by" class="form-control" id="replace_by" placeholder="replace_by - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . replace_by . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end replace_by -->

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
