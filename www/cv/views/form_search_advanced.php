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
<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="cv">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="all">


        <?php # first_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="first_name"><?php _t("First_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="first_name"  value="" >
        </div>	
    </div>
    <?php # /first_name ?>

    <?php # last_name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="last_name"><?php _t("Last_name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="last_name"  value="" >
        </div>	
    </div>
    <?php # /last_name ?>

    <?php # address ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="address"><?php _t("Address"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="address" class="form-control" id="address" placeholder="address"  value="" >
        </div>	
    </div>
    <?php # /address ?>

    <?php # city ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="city"><?php _t("City"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="city" class="form-control" id="city" placeholder="city"  value="" >
        </div>	
    </div>
    <?php # /city ?>

    <?php # postal_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="postal_code"><?php _t("Postal_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="postal_code" class="form-control" id="postal_code" placeholder="postal_code"  value="" >
        </div>	
    </div>
    <?php # /postal_code ?>

    <?php # phone_number ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="phone_number"><?php _t("Phone_number"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="phone_number"  value="" >
        </div>	
    </div>
    <?php # /phone_number ?>

    <?php # email ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="email" class="form-control" id="email" placeholder="email"  value="" >
        </div>	
    </div>
    <?php # /email ?>

    <?php # driver_license ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="driver_license"><?php _t("Driver_license"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="driver_license" class="form-control" id="driver_license" placeholder="driver_license"  value="" >
        </div>	
    </div>
    <?php # /driver_license ?>

    <?php # birth_date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="birth_date"><?php _t("Birth_date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="birth_date" class="form-control" id="birth_date" placeholder="birth_date"  value="" >
        </div>	
    </div>
    <?php # /birth_date ?>

    <?php # availability ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="availability"><?php _t("Availability"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="availability" class="form-control" id="availability" placeholder="availability"  value="" >
        </div>	
    </div>
    <?php # /availability ?>

    <?php # professional_goal ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="professional_goal"><?php _t("Professional_goal"); ?></label>
        <div class="col-sm-8">
            <textarea name="professional_goal" class="form-control" id="professional_goal" placeholder="professional_goal - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . professional_goal . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /professional_goal ?>

    <?php # summary ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="summary"><?php _t("Summary"); ?></label>
        <div class="col-sm-8">
            <textarea name="summary" class="form-control" id="summary" placeholder="summary - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . summary . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /summary ?>

    <?php # hobbies ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="hobbies"><?php _t("Hobbies"); ?></label>
        <div class="col-sm-8">
            <textarea name="hobbies" class="form-control" id="hobbies" placeholder="hobbies - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . hobbies . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /hobbies ?>

    <?php # created_at ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="created_at"><?php _t("Created_at"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="created_at" class="form-control" id="created_at" placeholder="created_at"  value="" >
        </div>	
    </div>
    <?php # /created_at ?>

    <?php # work_experience ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="work_experience"><?php _t("Work_experience"); ?></label>
        <div class="col-sm-8">
            <textarea name="work_experience" class="form-control" id="work_experience" placeholder="work_experience - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . work_experience . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /work_experience ?>

    <?php # education ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="education"><?php _t("Education"); ?></label>
        <div class="col-sm-8">
            <textarea name="education" class="form-control" id="education" placeholder="education - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . education . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /education ?>

    <?php # technologies ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="technologies"><?php _t("Technologies"); ?></label>
        <div class="col-sm-8">
            <textarea name="technologies" class="form-control" id="technologies" placeholder="technologies - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . technologies . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /technologies ?>

    <?php # skills ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="skills"><?php _t("Skills"); ?></label>
        <div class="col-sm-8">
            <textarea name="skills" class="form-control" id="skills" placeholder="skills - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . skills . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /skills ?>

    <?php # projects ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="projects"><?php _t("Projects"); ?></label>
        <div class="col-sm-8">
            <textarea name="projects" class="form-control" id="projects" placeholder="projects - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . projects . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /projects ?>

    <?php # languages ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="languages"><?php _t("Languages"); ?></label>
        <div class="col-sm-8">
            <textarea name="languages" class="form-control" id="languages" placeholder="languages - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . languages . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /languages ?>

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
