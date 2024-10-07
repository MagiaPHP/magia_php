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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_experiences">
    <input type="hidden" name="a" value="edit">
    <input type="hidden" name="id" value="<?php echo $cv_experiences->getId(); ?>">
        <?php # cv_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cv_id"><?php _t("Cv id"); ?></label>
        <div class="col-sm-8">
               <select name="cv_id" class="form-control selectpicker" id="cv_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_select("id", array("id"), $cv_experiences->getCv_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /cv_id ?>

    <?php # role ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="role"><?php _t("Role"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="role" class="form-control" id="role" placeholder="role"  value="<?php echo $cv_experiences->getRole(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /role ?>

    <?php # company ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company"><?php _t("Company"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="company" class="form-control" id="company" placeholder="company"  value="<?php echo $cv_experiences->getCompany(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /company ?>

    <?php # employment_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employment_type"><?php _t("Employment type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="employment_type" class="form-control" id="employment_type" placeholder="employment_type"  value="<?php echo $cv_experiences->getEmployment_type(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /employment_type ?>

    <?php # start_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_date"><?php _t("Start date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="start_date" class="form-control" id="start_date" placeholder="start_date"  value="<?php echo $cv_experiences->getStart_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /start_date ?>

    <?php # end_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_date"><?php _t("End date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="end_date" class="form-control" id="end_date" placeholder="end_date"  value="<?php echo $cv_experiences->getEnd_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /end_date ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea"  disabled="" ><?php echo $cv_experiences->getDescription(); ?></textarea>    <script>
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
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $cv_experiences->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($cv_experiences->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($cv_experiences->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

