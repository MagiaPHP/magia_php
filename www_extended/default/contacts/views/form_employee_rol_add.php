<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_contacts_employees_add_cargo">    
    <input type="hidden" name="company_id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $employees_list_by_company["contact_id"]; ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Employee"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="email" 
                class="form-control" 
                name="" 
                id=""  
                placeholder="<?php echo contacts_formated($employees_list_by_company["contact_id"]); ?>" 
                value="<?php echo contacts_formated($employees_list_by_company["contact_id"]); ?>" 
                disabled=""
                >
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Rol"); ?></label>
        <div class="col-sm-7">    
            <select  class="form-control" name="rol">                
                <?php
                foreach (rols_list() as $key => $value) {
                    if ($value['rango'] <= $config_rango_max_for_labo && $value['rango'] <= rols_rango_by_rol($u_rol)) {
                        echo '<option value="' . $value['rol'] . '">';
                        echo ("$value[rol]") . ' </option> ';
                    }
                }
                ?>            
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Email"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="email" 
                class="form-control" 
                name="email" 
                id="email"  
                placeholder="<?php echo _t("User email"); ?>" 
                required=""
                >
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Password"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="password" 
                id="np"  
                placeholder=""  
                required=""
                >
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  






</form>