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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="docu">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # controllers ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controllers"><?php _t("Controllers"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controllers" class="form-control" id="controllers" placeholder="controllers"  required=""  value="" >
        </div>	
    </div>
    <?php # /controllers ?>

    <?php # action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t("Action"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="action" class="form-control" id="action" placeholder="action"  required=""  value="" >
        </div>	
    </div>
    <?php # /action ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="language" class="form-control" id="language" placeholder="language"  required=""  value="" >
        </div>	
    </div>
    <?php # /language ?>

    <?php # father_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father_id"); ?></label>
        <div class="col-sm-8">
               <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                docu_select("id", array("id"), $docu->getFather_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8">
            <textarea name="post" class="form-control" id="post" placeholder="post - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . post . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /post ?>

    <?php # h ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="h"><?php _t("H"); ?></label>
        <div class="col-sm-8">
            <select name="h" class="form-control" id="h" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /h ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"  ><?php echo _t("Actived"); ?></option>
                <option value="0"  ><?php echo _t("Blocked"); ?></option>
                </select>
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
