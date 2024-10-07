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
# Fecha de creacion del documento: 2024-09-21 12:09:10 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="hr_employee_clothes">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # employee_sizes_clothes_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_sizes_clothes_id"><?php _t("Employee_sizes_clothes_id"); ?></label>
        <div class="col-sm-8">
               <select name="employee_sizes_clothes_id" class="form-control selectpicker" id="employee_sizes_clothes_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                hr_employee_sizes_clothes_select("id", array("id"), $hr_employee_clothes->getEmployee_sizes_clothes_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /employee_sizes_clothes_id ?>

    <?php # date_of_delivery ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_of_delivery"><?php _t("Date_of_delivery"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_of_delivery" class="form-control" id="date_of_delivery" placeholder="date_of_delivery"  required=""  value="" >
        </div>	
    </div>
    <?php # /date_of_delivery ?>

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
