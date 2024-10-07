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
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start job_title -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_title"><?php _t(ucfirst("job_title")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="job_title"  required=""  value="" >
</div>
    </div>
    <!-- mg_end job_title -->

    <!-- mg_start reference_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="reference_number"><?php _t(ucfirst("reference_number")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="reference_number" class="form-control" id="reference_number" placeholder="reference_number"  value="" >
</div>
    </div>
    <!-- mg_end reference_number -->

    <!-- mg_start creation_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="creation_date"><?php _t(ucfirst("creation_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="creation_date" class="form-control" id="creation_date" placeholder="creation_date"  value="" >
</div>
    </div>
    <!-- mg_end creation_date -->

    <!-- mg_start company_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_name"><?php _t(ucfirst("company_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="company_name"  value="" >
</div>
    </div>
    <!-- mg_end company_name -->

    <!-- mg_start location -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t(ucfirst("location")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="location" class="form-control" id="location" placeholder="location"  value="" >
</div>
    </div>
    <!-- mg_end location -->

    <!-- mg_start ciudad -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="ciudad"><?php _t(ucfirst("ciudad")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="ciudad"  value="" >
</div>
    </div>
    <!-- mg_end ciudad -->

    <!-- mg_start working_hours -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="working_hours"><?php _t(ucfirst("working_hours")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="working_hours" class="form-control" id="working_hours" placeholder="working_hours"  value="" >
</div>
    </div>
    <!-- mg_end working_hours -->

    <!-- mg_start contract_type -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contract_type"><?php _t(ucfirst("contract_type")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="contract_type" class="form-control" id="contract_type" placeholder="contract_type"  value="" >
</div>
    </div>
    <!-- mg_end contract_type -->

    <!-- mg_start job_family -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_family"><?php _t(ucfirst("job_family")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="job_family" class="form-control" id="job_family" placeholder="job_family"  value="" >
</div>
    </div>
    <!-- mg_end job_family -->

    <!-- mg_start job_description -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_description"><?php _t(ucfirst("job_description")); ?> </label>
        <div class="col-sm-8">            <textarea name="job_description" class="form-control" id="job_description" placeholder="job_description - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . job_description . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end job_description -->

    <!-- mg_start profile -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="profile"><?php _t(ucfirst("profile")); ?> </label>
        <div class="col-sm-8">            <textarea name="profile" class="form-control" id="profile" placeholder="profile - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . profile . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end profile -->

    <!-- mg_start language_requirements -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="language_requirements"><?php _t(ucfirst("language_requirements")); ?> </label>
        <div class="col-sm-8">            <textarea name="language_requirements" class="form-control" id="language_requirements" placeholder="language_requirements - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . language_requirements . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end language_requirements -->

    <!-- mg_start employer_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="employer_name"><?php _t(ucfirst("employer_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="employer_name" class="form-control" id="employer_name" placeholder="employer_name"  value="" >
</div>
    </div>
    <!-- mg_end employer_name -->

    <!-- mg_start contact_person -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="contact_person"><?php _t(ucfirst("contact_person")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="contact_person" class="form-control" id="contact_person" placeholder="contact_person"  value="" >
</div>
    </div>
    <!-- mg_end contact_person -->

    <!-- mg_start application_mode -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="application_mode"><?php _t(ucfirst("application_mode")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="application_mode" class="form-control" id="application_mode" placeholder="application_mode"  value="" >
</div>
    </div>
    <!-- mg_end application_mode -->

    <!-- mg_start website_url -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="website_url"><?php _t(ucfirst("website_url")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="website_url" class="form-control" id="website_url" placeholder="website_url"  value="" >
</div>
    </div>
    <!-- mg_end website_url -->

    <!-- mg_start order_by -->
    <!-- mg_start status -->
  
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>   

<p>* <?php _t("Required"); ?></p>

</form>
