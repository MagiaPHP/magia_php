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
# Fecha de creacion del documento: 2024-09-22 18:09:50 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="docu_images">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # docu_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="docu_id"><?php _t("Docu_id"); ?></label>
        <div class="col-sm-8">
               <select name="docu_id" class="form-control selectpicker" id="docu_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                docu_select("id", array("id"), $docu_images->getDocu_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /docu_id ?>

    <?php # bloc_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="bloc_id"><?php _t("Bloc_id"); ?></label>
        <div class="col-sm-8">
               <select name="bloc_id" class="form-control selectpicker" id="bloc_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                docu_blocs_select("id", array("id"), $docu_images->getBloc_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /bloc_id ?>

    <?php # image ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="image"><?php _t("Image"); ?></label>
        <div class="col-sm-8">
            <textarea name="image" class="form-control" id="image" placeholder="image - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . image . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /image ?>

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
