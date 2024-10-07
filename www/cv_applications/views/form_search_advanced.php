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
# Fecha de creacion del documento: 2024-09-18 12:09:00 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_applications">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # job_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_id"><?php _t("Job_id"); ?></label>
        <div class="col-sm-8">
               <select name="job_id" class="form-control selectpicker" id="job_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_jobs_select("id", array("id"), $cv_applications->getJob_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /job_id ?>

    <?php # applicant_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="applicant_name"><?php _t("Applicant_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="applicant_name" class="form-control" id="applicant_name" placeholder="applicant_name"  required=""  value="" >
        </div>	
    </div>
    <?php # /applicant_name ?>

    <?php # applicant_email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="applicant_email"><?php _t("Applicant_email"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="applicant_email" class="form-control" id="applicant_email" placeholder="applicant_email"  required=""  value="" >
        </div>	
    </div>
    <?php # /applicant_email ?>

    <?php # application_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="application_date"><?php _t("Application_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="application_date" class="form-control" id="application_date" placeholder="application_date"  value="" >
        </div>	
    </div>
    <?php # /application_date ?>

    <?php # resume ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="resume"><?php _t("Resume"); ?></label>
        <div class="col-sm-8">
            <textarea name="resume" class="form-control" id="resume" placeholder="resume - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . resume . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /resume ?>

    <?php # cover_letter ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="cover_letter"><?php _t("Cover_letter"); ?></label>
        <div class="col-sm-8">
            <textarea name="cover_letter" class="form-control" id="cover_letter" placeholder="cover_letter - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . cover_letter . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /cover_letter ?>

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
