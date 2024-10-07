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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="panels_lines">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $panels_lines->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # panel_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="panel_id"><?php _t("Panel_id"); ?></label>
        <div class="col-sm-8">
               <select name="panel_id" class="form-control selectpicker" id="panel_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                panels_select("id", array("id"), $panels_lines->getPanel_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /panel_id ?>

    <?php # icon ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t("Icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon"  value="<?php echo $panels_lines->getIcon(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /icon ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label"  required=""  value="<?php echo $panels_lines->getLabel(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /label ?>

    <?php # translate ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="translate"><?php _t("Translate"); ?></label>
        <div class="col-sm-8">
            <select name="translate" class="form-control" id="translate"  disabled="" >                
                <option value="1" <?php echo ($panels_lines->getTranslate() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($panels_lines->getTranslate() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /translate ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <textarea name="url" class="form-control" id="url" placeholder="url - textarea"  disabled="" ><?php echo $panels_lines->getUrl(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /url ?>

    <?php # badge ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="badge"><?php _t("Badge"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="badge" class="form-control" id="badge" placeholder="badge"  value="<?php echo $panels_lines->getBadge(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /badge ?>

    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="controller" class="form-control" id="controller" placeholder="controller"  value="<?php echo $panels_lines->getController(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /controller ?>

    <?php # action ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="action"><?php _t("Action"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="action" class="form-control" id="action" placeholder="action"  value="<?php echo $panels_lines->getAction(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /action ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $panels_lines->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($panels_lines->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($panels_lines->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

