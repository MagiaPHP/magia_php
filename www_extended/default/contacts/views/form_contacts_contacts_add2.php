<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    
    <?php // <input type="hidden" name="a" value="ok_contact_new">   ?>
    <input type="hidden" name="a" value="ok_add_new_contact">  
    
    
    <input type="hidden" name="office_id" value="<?php echo $id; ?>" >
    <input type="hidden" name="id" value="<?php echo $id; ?>" >

    <input type="hidden" name="redi" value="1">  


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
                    <option value="<?php echo $contacts_titles['title'] ?>" <?php //echo "$selected";       ?>><?php echo _t($contacts_titles['title']); ?></option>
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



    <?php if (modules_field_module('status', 'audio')) { ?>
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

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  


</form>



