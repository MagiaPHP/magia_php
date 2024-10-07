<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    
    <input type="hidden" name="a" value="ok_contacts_employees_add_cargo">    
    
    <input type="hidden" name="company_id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $clac['id']; ?>">
    <input type="hidden" name="redi" value="1">




    <div class="form-group">
        <label class="control-label col-sm-3" for="cargo"><?php _t("Job title"); ?></label>        

        <div class="col-sm-7">    
            <select class="selectpicker" data-live-search="true" name="cargo" id="cargo" >
                <?php
                foreach (employees_categories_list() as $key => $category) {

                    echo '<option value="' . $category['category'] . '">' . $category['category'] . '</option>';
                }
                ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for="owner_ref"><?php _t("Reference"); ?></label>        

        <div class="col-sm-7">    
            <input 
                type="text"  
                name="owner_ref" 
                class="form-control" 
                id="owner_ref"
                placeholder="<?php _t("Reference"); ?>"

                > 
        </div>
    </div>


    <hr>



    <a class="btn btn-default btn-sm" role="button" data-toggle="collapse" href="#collapseUser" aria-expanded="false" aria-controls="collapseUser">
        <?php echo icon("chevron-down"); ?>
    </a>


    <div class="collapse" id="collapseUser">

        <div class="form-group">
            <label class="control-label col-sm-3" for=""></label>
            <div class="col-sm-7">    
                <p>
                    <b>
                        <?php _t("If you wish to grant access to the system, you can do it here"); ?>
                    </b>
                </p>
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-sm-3" for=""><?php _t("Rol"); ?></label>
            <div class="col-sm-7">    

                <?php
                //vardump($config_rango_max_for_labo);
                ?>
                <select  class="form-control" name="rol">  
                    <option value="null"><?php _t("Select one"); ?></option>
                    <?php
                    foreach (rols_list() as $key => $value) {

                        // no puedo asignar rangos mas altos que losmios
                        // no puedo asignar rangos mas altos que los permitidos por el parametro 
                        //if ($value['rango'] <= $config_rango_max_for_labo && $value['rango'] <= rols_rango_by_rol($u_rol)) {

                        echo '<option value="' . $value['rol'] . '">';

                        echo ("$value[rol]") . ' </option> ';
                        //}
                    }
                    ?>            
                </select>
            </div>
        </div>





        <?php
        // Get the email address
        $email = directory_by_contact_name($clac['id'], 'Email') ? directory_by_contact_name($clac['id'], 'Email') : '';
        // Check if the email exists
        $isEmailReadonly = !empty($email) ? ' readonly ' : '';
        ?>

        <div class="form-group">
            <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?> * </label>
            <div class="col-sm-7">    
                <input 
                    type="email" 
                    class="form-control" 
                    name="email" 
                    id="email"  
                    placeholder="<?php echo _t('Enter user email, e.g. user@example.com'); ?>" 
                    value="<?php echo $email; ?>"
                    <?php echo $isEmailReadonly; ?> 
                    
                    >
            </div>
        </div>







        <div class="form-group">
            <label class="control-label col-sm-3" for=""><?php _t("Password"); ?> * </label>
            <div class="col-sm-7">    
                <input 
                    type="text" 
                    class="form-control" 
                    name="password" 
                    id="np"  
                    placeholder="<?php _t("Password"); ?>"  
                    
                    >
            </div>
        </div>

    </div>  

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">   
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  






</form>


