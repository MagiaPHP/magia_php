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
# Fecha de creacion del documento: 2024-09-18 06:09:28 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_education">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # cv_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cv_id"><?php _t("Cv_id"); ?></label>
        <div class="col-sm-8">
               <select name="cv_id" class="form-control selectpicker" id="cv_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_select("id", array("id"), $cv_education->getCv_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /cv_id ?>

    <?php # program ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="program"><?php _t("Program"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="program" class="form-control" id="program" placeholder="program"  value="" >
        </div>	
    </div>
    <?php # /program ?>

    <?php # institution ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="institution"><?php _t("Institution"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="institution" class="form-control" id="institution" placeholder="institution"  value="" >
        </div>	
    </div>
    <?php # /institution ?>

    <?php # start_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t("Start_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date"  value="" >
        </div>	
    </div>
    <?php # /start_date ?>

    <?php # end_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_date"><?php _t("End_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"  value="" >
        </div>	
    </div>
    <?php # /end_date ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="" >
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
