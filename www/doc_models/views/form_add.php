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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="doc_models">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t(ucfirst("name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end name -->

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

    <!-- mg_start params -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="params"><?php _t(ucfirst("params")); ?> </label>
        <div class="col-sm-8">            <textarea name="params" class="form-control" id="params" placeholder="params - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . params . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end params -->

    <!-- mg_start author -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="author"><?php _t(ucfirst("author")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="author" class="form-control" id="author" placeholder="author"  value="" >
</div>
    </div>
    <!-- mg_end author -->

    <!-- mg_start author_email -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="author_email"><?php _t(ucfirst("author_email")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="author_email" class="form-control" id="author_email" placeholder="author_email"  required=""  value="" >
</div>
    </div>
    <!-- mg_end author_email -->

    <!-- mg_start url -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t(ucfirst("url")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="url" class="form-control" id="url" placeholder="url"  required=""  value="" >
</div>
    </div>
    <!-- mg_end url -->

    <!-- mg_start version -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t(ucfirst("version")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="version" class="form-control" id="version" placeholder="version"  required=""  value="" >
</div>
    </div>
    <!-- mg_end version -->

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
