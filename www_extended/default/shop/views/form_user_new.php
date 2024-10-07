<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_user_new">    

    <input type="hidden" name="office_id" value="<?php echo $id; ?>" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" >


    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Office"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="text" 
                class="form-control" 
                name="officeName" 
                id="officeName"  
                placeholder="<?php echo _t("Office name"); ?>" 
                value="<?php echo contacts_formated($id) ?>"
                disabled=""
                >
        </div>
    </div>


    <div class="form-group">       
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>

        <div class="col-sm-8">    

            <select class="selectpicker" data-live-search="true" name="title" required="">
                <option></option>

                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['title'] ?>" <?php //echo "$selected";      ?>><?php echo $contacts_titles['title'] ?></option>
                <?php } ?>
            </select>

        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Name"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name"  
                placeholder="<?php echo _t("User name"); ?>" 

                >
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="text" 
                class="form-control" 
                name="lastname" 
                id="lastname"  
                placeholder="<?php echo _t("User Lastname"); ?>" 

                >
        </div>
    </div>







    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Rol"); ?></label>
        <div class="col-sm-8">    
            <select  class="form-control" name="rol">                
                <?php
                foreach (rols_list() as $key => $value) {
                    if ($value['rango'] <= $config_rango_max_for_labo && $value['rango'] <= rols_rango_by_rol($u_rol)) {
                        echo '<option value="' . $value['rol'] . '">';
                        echo _tr("$value[rol]") . ' </option> ';
                    }
                }
                ?>            
            </select>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Email"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="email" 
                class="form-control" 
                name="email" 
                id="email"  
                placeholder="<?php echo _t("User email"); ?>" 

                >
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Password"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="password" 
                class="form-control" 
                name="password" 
                id="np"  
                placeholder=""                 
                >
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <input type="checkbox" onclick="showPasswordNp()"> <?php _t("Show password"); ?>
    </div>







    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  


</form>




