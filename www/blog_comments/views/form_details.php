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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="blog_comments">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $blog_comments->getId(); ?>">
        <?php # blog_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="blog_id"><?php _t("Blog id"); ?></label>
        <div class="col-sm-8">
               <select name="blog_id" class="form-control selectpicker" id="blog_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                blog_select("id", array("id"), $blog_comments->getBlog_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /blog_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  required=""  value="<?php echo $blog_comments->getTitle(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # comment ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="comment"><?php _t("Comment"); ?></label>
        <div class="col-sm-8">
            <textarea name="comment" class="form-control" id="comment" placeholder="comment - textarea"  disabled="" ><?php echo $blog_comments->getComment(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . comment . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /comment ?>

    <?php # author_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="author_id"><?php _t("Author id"); ?></label>
        <div class="col-sm-8">
               <select name="author_id" class="form-control selectpicker" id="author_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                users_select("contact_id", array("contact_id"), $blog_comments->getAuthor_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /author_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date"  required=""  value="<?php echo $blog_comments->getDate(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $blog_comments->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="status" class="form-control" id="status" placeholder="status"   required=""  value="<?php echo $blog_comments->getStatus(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            
            <button type="submit" class="btn btn-default"><?php echo icon("pencil");  ?> <?php _t("Edit"); ?></button>

        </div>      							
    </div>      							

</form>

