
<form class="form-horizontal" action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo $contact['id'] ?>">


    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Company"); ?></label>	
        <div class="col-sm-7">    		
            <input class="form-control" type ="text " name ="" id=""value="<?php echo contacts_formated($contact['owner_id']) ?>" disabled=""/>
        </div>
    </div>	




    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Title"); ?></label>	
        <div class="col-sm-7">    		

            <select class="selectpicker" data-live-search="true" name="title">
                <option value=""><?php _t("Title"); ?></option>
                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    $selected = ($contacts_titles["title"] == $contact["title"]) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['title'] ?>" <?php echo "$selected"; ?>>
                        <?php echo _tr($contacts_titles['title']) ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>	






    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>	
        <div class="col-sm-7">    		
            <input class="form-control" type ="text " name ="name" id="name"value="<?php echo "$contact[name]"; ?>"/>
        </div>
    </div>	



    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Lastname"); ?></label>	
        <div class="col-sm-7">    		
            <input class="form-control" type ="text " name ="lastname" id="lastname" value="<?php echo "$contact[lastname]"; ?>"/>
        </div>
    </div>	






    <div class="form-group">
        <label class="control-label col-sm-3" for="birthdate"><?php _t("Birthdate"); ?></label>	
        <div class="col-sm-7">    		
            <div class="row">


                <div class="col-xs-3">
                    <select class="form-control" name="day">

                        <?php
                        for ($i = 1; $i <= 31; $i++) {

                            $selected_d = (dates_day_of_date($contact['birthdate']) == $i) ? " selected " : "";

                            echo "<option value=\"$i\" $selected_d >$i</option>";
                        }
                        ?>

                    </select>
                </div>


                <div class="col-xs-5">
                    <select class="form-control" name="month">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $selected_m = (dates_month_of_date($contact['birthdate']) == $i) ? " selected " : "";
                            echo "<option value=\"$i\" $selected_m >$i " . _tr($months[$i]) . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name="year">
                        <?php
                        for ($i = 1900; $i <= date("Y"); $i++) {
                            $selected_a = (dates_year_of_date($contact['birthdate']) == $i) ? " selected " : "";
                            echo "<option value=\"$i\" $selected_a >$i</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>


        </div>
    </div>	


    <div class="form-group">
        <label class="control-label col-sm-3" for="name"></label>	
        <div class="col-sm-7">    		
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Update"); ?>">
        </div>
    </div>	


</form>

