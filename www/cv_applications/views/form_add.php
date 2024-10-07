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
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cv_applications">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start job_id -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="job_id"><?php _t(ucfirst("job_id")); ?>  * </label>
        <div class="col-sm-8">               <select name="job_id" class="form-control selectpicker" id="job_id" data-live-search="true" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                cv_jobs_select("id", array("id"), "" , array()); ?>                        
                </select>
</div>
    </div>
    <!-- mg_end job_id -->

    <!-- mg_start applicant_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="applicant_name"><?php _t(ucfirst("applicant_name")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="applicant_name" class="form-control" id="applicant_name" placeholder="applicant_name"  required=""  value="" >
</div>
    </div>
    <!-- mg_end applicant_name -->

    <!-- mg_start applicant_email -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="applicant_email"><?php _t(ucfirst("applicant_email")); ?>  * </label>
        <div class="col-sm-8">            <input type="text" name="applicant_email" class="form-control" id="applicant_email" placeholder="applicant_email"  required=""  value="" >
</div>
    </div>
    <!-- mg_end applicant_email -->

    <!-- mg_start application_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="application_date"><?php _t(ucfirst("application_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="application_date" class="form-control" id="application_date" placeholder="application_date"  value="" >
</div>
    </div>
    <!-- mg_end application_date -->

    <!-- mg_start resume -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="resume"><?php _t(ucfirst("resume")); ?> </label>
        <div class="col-sm-8">            <textarea name="resume" class="form-control" id="resume" placeholder="resume - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . resume . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end resume -->

    <!-- mg_start cover_letter -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="cover_letter"><?php _t(ucfirst("cover_letter")); ?> </label>
        <div class="col-sm-8">            <textarea name="cover_letter" class="form-control" id="cover_letter" placeholder="cover_letter - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . cover_letter . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end cover_letter -->

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
