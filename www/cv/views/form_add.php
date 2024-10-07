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
# Fecha de creacion del documento: 2024-09-18 07:09:41 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="cv">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">
    
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">
    
    <!-- mg_start first_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="first_name"><?php _t(ucfirst("first_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="first_name"  value="" >
</div>
    </div>
    <!-- mg_end first_name -->

    <!-- mg_start last_name -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="last_name"><?php _t(ucfirst("last_name")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last_name"  value="" >
</div>
    </div>
    <!-- mg_end last_name -->

    <!-- mg_start address -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t(ucfirst("address")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="address" class="form-control" id="address" placeholder="address"  value="" >
</div>
    </div>
    <!-- mg_end address -->

    <!-- mg_start city -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="city"><?php _t(ucfirst("city")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="city" class="form-control" id="city" placeholder="city"  value="" >
</div>
    </div>
    <!-- mg_end city -->

    <!-- mg_start postal_code -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="postal_code"><?php _t(ucfirst("postal_code")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="postal_code"  value="" >
</div>
    </div>
    <!-- mg_end postal_code -->

    <!-- mg_start phone_number -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone_number"><?php _t(ucfirst("phone_number")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="phone_number"  value="" >
</div>
    </div>
    <!-- mg_end phone_number -->

    <!-- mg_start email -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t(ucfirst("email")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="email" class="form-control" id="email" placeholder="email"  value="" >
</div>
    </div>
    <!-- mg_end email -->

    <!-- mg_start driver_license -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_license"><?php _t(ucfirst("driver_license")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="driver_license" class="form-control" id="driver_license" placeholder="driver_license"  value="" >
</div>
    </div>
    <!-- mg_end driver_license -->

    <!-- mg_start birth_date -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="birth_date"><?php _t(ucfirst("birth_date")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="birth_date" class="form-control" id="birth_date" placeholder="birth_date"  value="" >
</div>
    </div>
    <!-- mg_end birth_date -->

    <!-- mg_start availability -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="availability"><?php _t(ucfirst("availability")); ?> </label>
        <div class="col-sm-8">            <input type="text" name="availability" class="form-control" id="availability" placeholder="availability"  value="" >
</div>
    </div>
    <!-- mg_end availability -->

    <!-- mg_start professional_goal -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="professional_goal"><?php _t(ucfirst("professional_goal")); ?> </label>
        <div class="col-sm-8">            <textarea name="professional_goal" class="form-control" id="professional_goal" placeholder="professional_goal - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . professional_goal . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end professional_goal -->

    <!-- mg_start summary -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="summary"><?php _t(ucfirst("summary")); ?> </label>
        <div class="col-sm-8">            <textarea name="summary" class="form-control" id="summary" placeholder="summary - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . summary . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end summary -->

    <!-- mg_start hobbies -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="hobbies"><?php _t(ucfirst("hobbies")); ?> </label>
        <div class="col-sm-8">            <textarea name="hobbies" class="form-control" id="hobbies" placeholder="hobbies - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . hobbies . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end hobbies -->

    <!-- mg_start created_at -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_at"><?php _t(ucfirst("created_at")); ?> </label>
        <div class="col-sm-8">            <input type="date" name="created_at" class="form-control" id="created_at" placeholder="created_at"  value="current_timestamp()" >
</div>
    </div>
    <!-- mg_end created_at -->

    <!-- mg_start work_experience -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="work_experience"><?php _t(ucfirst("work_experience")); ?> </label>
        <div class="col-sm-8">            <textarea name="work_experience" class="form-control" id="work_experience" placeholder="work_experience - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . work_experience . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end work_experience -->

    <!-- mg_start education -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="education"><?php _t(ucfirst("education")); ?> </label>
        <div class="col-sm-8">            <textarea name="education" class="form-control" id="education" placeholder="education - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . education . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end education -->

    <!-- mg_start technologies -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="technologies"><?php _t(ucfirst("technologies")); ?> </label>
        <div class="col-sm-8">            <textarea name="technologies" class="form-control" id="technologies" placeholder="technologies - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . technologies . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end technologies -->

    <!-- mg_start skills -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="skills"><?php _t(ucfirst("skills")); ?> </label>
        <div class="col-sm-8">            <textarea name="skills" class="form-control" id="skills" placeholder="skills - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . skills . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end skills -->

    <!-- mg_start projects -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="projects"><?php _t(ucfirst("projects")); ?> </label>
        <div class="col-sm-8">            <textarea name="projects" class="form-control" id="projects" placeholder="projects - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . projects . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end projects -->

    <!-- mg_start languages -->
    <div class="form-group">
        <label class="control-label col-sm-3" for="languages"><?php _t(ucfirst("languages")); ?> </label>
        <div class="col-sm-8">            <textarea name="languages" class="form-control" id="languages" placeholder="languages - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . languages . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
</div>
    </div>
    <!-- mg_end languages -->

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
