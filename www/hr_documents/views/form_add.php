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
# Fecha de creacion del documento: 2024-09-21 12:09:00 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_documents">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t(ucfirst("code")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="code" class="form-control" id="code" placeholder="code"  required=""  value="" >
</div>
    </div>
    <!-- mg_end code -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="title" class="form-control" id="title" placeholder="title"  required=""  value="" >
</div>
    </div>
    <!-- mg_end title -->

    <!-- mg_start content -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="content"><?php _t(ucfirst("content")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="content" class="form-control" id="content" placeholder="content - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . content . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end content -->

    <!-- mg_start version -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="version"><?php _t(ucfirst("version")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="version" class="form-control" id="version" placeholder="version"  required=""  value="" >
</div>
    </div>
    <!-- mg_end version -->

    <!-- mg_start date_creation -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_creation"><?php _t(ucfirst("date_creation")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date_creation" class="form-control" id="date_creation" placeholder="date_creation"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end date_creation -->

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
