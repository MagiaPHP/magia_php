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
# Fecha de creacion del documento: 2024-09-27 12:09:05 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="blog_comments">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1 ; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start blog_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="blog_id"><?php _t(ucfirst("blog_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="blog_id" class="form-control selectpicker" id="blog_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                blog_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end blog_id -->

    <!-- mg_start title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t(ucfirst("title")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="title" class="form-control" id="title" placeholder="title"  required=""  value="" >
</div>
    </div>
    <!-- mg_end title -->

    <!-- mg_start comment -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="comment"><?php _t(ucfirst("comment")); ?>  * </label>
        <div class="col-sm-8">            <textarea name="comment" class="form-control" id="comment" placeholder="comment - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comment . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end comment -->

    <!-- mg_start author_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="author_id"><?php _t(ucfirst("author_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="author_id" class="form-control selectpicker" id="author_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                users_select("contact_id", array("contact_id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end author_id -->

    <!-- mg_start date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t(ucfirst("date")); ?>  * </label>
        <div class="col-sm-8">            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end date -->

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
