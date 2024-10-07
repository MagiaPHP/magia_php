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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="veh_driver_licenses">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # category ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" placeholder="category"  required=""  value="" >
        </div>	
    </div>
    <?php # /category ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" placeholder="description"  required=""  value="" >
        </div>	
    </div>
    <?php # /description ?>

    <?php # min_age ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="min_age"><?php _t("Min_age"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="min_age" class="form-control" id="min_age" placeholder="min_age"  required=""  value="" >
        </div>	
    </div>
    <?php # /min_age ?>

    <?php # max_weight ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="max_weight"><?php _t("Max_weight"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="max_weight" class="form-control" id="max_weight" placeholder="max_weight"   value="" >
        </div>	
    </div>
    <?php # /max_weight ?>

    <?php # max_passengers ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="max_passengers"><?php _t("Max_passengers"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="max_passengers" class="form-control" id="max_passengers" placeholder="max_passengers"   value="" >
        </div>	
    </div>
    <?php # /max_passengers ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

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
