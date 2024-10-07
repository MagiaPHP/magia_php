<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="employees">
    <input type="hidden" name="a" value="ok_add">  
    <input type="hidden" name="redi[redi]" value="1">  


    <input type="hidden" name="company_id" value="<?php echo $id; ?>" >
    <input type="hidden" name="contact_id" value="<?php echo $u_id; ?>" >


    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Office"); ?></label>
        <div class="col-sm-7">    
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
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>

        <div class="col-sm-7">    

            <select class="selectpicker" data-live-search="true" name="title" required="">
                <option value=""><?php _t("Select one"); ?></option>

                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['title'] ?>" <?php //echo "$selected";                                             ?>><?php echo _t($contacts_titles['title']); ?></option>
                <?php } ?>
            </select>

        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Name"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name"  
                placeholder="<?php echo _t("Name"); ?>" 

                >
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Lastname"); ?></label>
        <div class="col-sm-7">    
            <input 
                type="text" 
                class="form-control" 
                name="lastname" 
                id="lastname"  
                placeholder="<?php echo _t("Lastname"); ?>" 

                >
        </div>
    </div>



    <?php if (_options_option('config_contacts_birthdate')) { ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="name"><?php _t("Birthdate"); ?></label>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-xs-3">
                        <select class="form-control" name="day">
                            <?php
                            for ($i = 1; $i <= 31; $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <select class="form-control" name="month">
                            <?php
                            for ($i = 1; $i <= 12; $i++) {
                                echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <select class="form-control" name="year">
                            <?php
                            for ($i = 1900; $i <= date("Y"); $i++) {
                                echo "<option value=\"$i\">$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    ?>

    <hr>

    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("What position does he hold"); ?></label>        

        <div class="col-sm-7">    
            <input 
                type="text"  
                name="cargo" 
                class="form-control" 
                id="cargo"
                placeholder="Employee"
                required=""
                > 
        </div>
    </div>



    <?php
    /**
     *     <div class="form-group">
      <label class="control-label col-sm-3" for="email"><?php _t("Email"); ?></label>
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
     */
    ?>

    <hr>

    <?php if (modules_field_module('status', 'audio')) { ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for=""><?php _t("Rol"); ?></label>
            <div class="col-sm-7">    
                <select  class="form-control" name="rol">                
                    <?php
                    // roles segun si es interno o externo
                    $roles = ($id == 1022) ? rols_list_internal() : rols_list_external();

                    foreach ($roles as $key => $value) {
                        if ($value['rango'] <= rols_rango_by_rol($u_rol)) {
                            echo '<option value="' . $value['rol'] . '">';
                            echo ("$value[rol]") . ' </option> ';
                        }
                    }
                    ?>            
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="password"><?php _t("Password"); ?></label>
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
    <?php } else { ?>
        <input type="hidden" name="rol" value="<?php echo rols_by_rango_min(); ?>"> 
        <input type="hidden" name="password" value="A1<?php echo magia_uniqid(); ?>"> 
    <?php } ?>

    <?php
    /*
      <div class="form-group">
      <label class="control-label col-sm-3" for=""></label>
      <input type="checkbox" onclick="showPasswordNp()"> <?php _t("Show password"); ?>
      </div>
     */
    ?>






    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  


</form>



