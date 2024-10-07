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
# Fecha de creacion del documento: 2024-09-23 19:09:40 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv_jobs">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # job_title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_title"><?php _t("Job_title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="job_title"  required=""  value="" >
        </div>	
    </div>
    <?php # /job_title ?>

    <?php # reference_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reference_number"><?php _t("Reference_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="reference_number" class="form-control" id="reference_number" placeholder="reference_number"  value="" >
        </div>	
    </div>
    <?php # /reference_number ?>

    <?php # creation_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="creation_date"><?php _t("Creation_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="creation_date" class="form-control" id="creation_date" placeholder="creation_date"  value="" >
        </div>	
    </div>
    <?php # /creation_date ?>

    <?php # company_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_name"><?php _t("Company_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="company_name"  value="" >
        </div>	
    </div>
    <?php # /company_name ?>

    <?php # location ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="location" class="form-control" id="location" placeholder="location"  value="" >
        </div>	
    </div>
    <?php # /location ?>

    <?php # ciudad ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ciudad"><?php _t("Ciudad"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="ciudad"  value="" >
        </div>	
    </div>
    <?php # /ciudad ?>

    <?php # working_hours ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="working_hours"><?php _t("Working_hours"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="working_hours" class="form-control" id="working_hours" placeholder="working_hours"  value="" >
        </div>	
    </div>
    <?php # /working_hours ?>

    <?php # contract_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contract_type"><?php _t("Contract_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contract_type" class="form-control" id="contract_type" placeholder="contract_type"  value="" >
        </div>	
    </div>
    <?php # /contract_type ?>

    <?php # job_family ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_family"><?php _t("Job_family"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="job_family" class="form-control" id="job_family" placeholder="job_family"  value="" >
        </div>	
    </div>
    <?php # /job_family ?>

    <?php # job_description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_description"><?php _t("Job_description"); ?></label>
        <div class="col-sm-8">
            <textarea name="job_description" class="form-control" id="job_description" placeholder="job_description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . job_description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /job_description ?>

    <?php # profile ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="profile"><?php _t("Profile"); ?></label>
        <div class="col-sm-8">
            <textarea name="profile" class="form-control" id="profile" placeholder="profile - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . profile . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /profile ?>

    <?php # language_requirements ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="language_requirements"><?php _t("Language_requirements"); ?></label>
        <div class="col-sm-8">
            <textarea name="language_requirements" class="form-control" id="language_requirements" placeholder="language_requirements - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . language_requirements . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /language_requirements ?>

    <?php # employer_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employer_name"><?php _t("Employer_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="employer_name" class="form-control" id="employer_name" placeholder="employer_name"  value="" >
        </div>	
    </div>
    <?php # /employer_name ?>

    <?php # contact_person ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_person"><?php _t("Contact_person"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="contact_person"  value="" >
        </div>	
    </div>
    <?php # /contact_person ?>

    <?php # application_mode ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="application_mode"><?php _t("Application_mode"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="application_mode" class="form-control" id="application_mode" placeholder="application_mode"  value="" >
        </div>	
    </div>
    <?php # /application_mode ?>

    <?php # website_url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="website_url"><?php _t("Website_url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="website_url" class="form-control" id="website_url" placeholder="website_url"  value="" >
        </div>	
    </div>
    <?php # /website_url ?>

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
