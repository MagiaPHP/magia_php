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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cv_jobs">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $cv_jobs->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # job_title ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_title"><?php _t("Job_title"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="job_title"  required=""  value="<?php echo $cv_jobs->getJob_title(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /job_title ?>

    <?php # reference_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="reference_number"><?php _t("Reference_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="reference_number" class="form-control" id="reference_number" placeholder="reference_number"  value="<?php echo $cv_jobs->getReference_number(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /reference_number ?>

    <?php # creation_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="creation_date"><?php _t("Creation_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="creation_date" class="form-control" id="creation_date" placeholder="creation_date"  value="<?php echo $cv_jobs->getCreation_date(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /creation_date ?>

    <?php # company_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_name"><?php _t("Company_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="company_name"  value="<?php echo $cv_jobs->getCompany_name(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /company_name ?>

    <?php # location ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="location" class="form-control" id="location" placeholder="location"  value="<?php echo $cv_jobs->getLocation(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /location ?>

    <?php # ciudad ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="ciudad"><?php _t("Ciudad"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="ciudad"  value="<?php echo $cv_jobs->getCiudad(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /ciudad ?>

    <?php # working_hours ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="working_hours"><?php _t("Working_hours"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="working_hours" class="form-control" id="working_hours" placeholder="working_hours"  value="<?php echo $cv_jobs->getWorking_hours(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /working_hours ?>

    <?php # contract_type ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contract_type"><?php _t("Contract_type"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contract_type" class="form-control" id="contract_type" placeholder="contract_type"  value="<?php echo $cv_jobs->getContract_type(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contract_type ?>

    <?php # job_family ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_family"><?php _t("Job_family"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="job_family" class="form-control" id="job_family" placeholder="job_family"  value="<?php echo $cv_jobs->getJob_family(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /job_family ?>

    <?php # job_description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_description"><?php _t("Job_description"); ?></label>
        <div class="col-sm-8">
            <textarea name="job_description" class="form-control" id="job_description" placeholder="job_description - textarea"  disabled="" ><?php echo $cv_jobs->getJob_description(); ?></textarea>    <script>
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
            <textarea name="profile" class="form-control" id="profile" placeholder="profile - textarea"  disabled="" ><?php echo $cv_jobs->getProfile(); ?></textarea>    <script>
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
            <textarea name="language_requirements" class="form-control" id="language_requirements" placeholder="language_requirements - textarea"  disabled="" ><?php echo $cv_jobs->getLanguage_requirements(); ?></textarea>    <script>
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
            <input type="text" name="employer_name" class="form-control" id="employer_name" placeholder="employer_name"  value="<?php echo $cv_jobs->getEmployer_name(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /employer_name ?>

    <?php # contact_person ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_person"><?php _t("Contact_person"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="contact_person"  value="<?php echo $cv_jobs->getContact_person(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /contact_person ?>

    <?php # application_mode ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="application_mode"><?php _t("Application_mode"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="application_mode" class="form-control" id="application_mode" placeholder="application_mode"  value="<?php echo $cv_jobs->getApplication_mode(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /application_mode ?>

    <?php # website_url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="website_url"><?php _t("Website_url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="website_url" class="form-control" id="website_url" placeholder="website_url"  value="<?php echo $cv_jobs->getWebsite_url(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /website_url ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   value="<?php echo $cv_jobs->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($cv_jobs->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($cv_jobs->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
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

