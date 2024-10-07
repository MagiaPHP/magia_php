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
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $docu->getId(); ?>">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # controllers ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controllers"><?php _t("Controllers"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controllers" class="form-control" id="controllers" placeholder="controllers"  required=""  value="<?php echo $docu->getControllers(); ?>" >
        </div>	
    </div>
    <?php # /controllers ?>

    <?php # action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t("Action"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="action" class="form-control" id="action" placeholder="action"  required=""  value="<?php echo $docu->getAction(); ?>" >
        </div>	
    </div>
    <?php # /action ?>

    <?php # language ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="language"><?php _t("Language"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="language" class="form-control" id="language" placeholder="language"  required=""  value="<?php echo $docu->getLanguage(); ?>" >
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
            <input type="text" name="title" class="form-control" id="title" placeholder="title"  value="<?php echo $docu->getTitle(); ?>" >
        </div>	
    </div>
    <?php # /title ?>

    <?php # post ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="post"><?php _t("Post"); ?></label>
        <div class="col-sm-8">
            <textarea name="post" class="form-control" id="post" placeholder="post - textarea" ><?php echo $docu->getPost(); ?></textarea>    <script>
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
                <option value="1" <?php echo ($docu->getH() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($docu->getH() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /h ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $docu->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($docu->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($docu->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

