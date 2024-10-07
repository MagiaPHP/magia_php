<form class="form-horizontal" action ="index.php" method="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add">

    <div class="form-group">
        <label class="control-label col-sm-2" for="owner_id"><?php _t("Company"); ?></label>
        <div class="col-sm-8">                    

            <select class="selectpicker" data-live-search="true" data-width="100%" name="owner_id" id="owner_id">	


                <?php
                //foreach (type_article_array() as $key => $value) {
                foreach (contacts_list_by_type(1) as $key => $contact_list) {
                    //$selected = ($value['id'] == $detail_article['type_id'] ) ? " selected " : "80";
                    ?>

                    <option value="<?php echo $contact_list["id"]; ?>"><?php echo $contact_list["name"]; ?></option>


                <?php }
                ?>
            </select>


        </div>	
    </div>








    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>	
        <div class="col-sm-8">    		
            <select class="selectpicker" data-live-search="true" name="title">

                <?php
                //echo var_dump(contacts_titles_list());
                foreach (contacts_titles_list() as $key => $contacts_titles) {

                    // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $contacts_titles['abbreviation'] ?>" <?php //echo "$selected";     ?>><?php echo $contacts_titles['title'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>	




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text " name ="name" id="<?php _t("Name"); ?>"/>
        </div>
    </div>	



    <div class="form-group">
        <label class="control-label col-sm-2" for="lastname"><?php _t("Lastname"); ?></label>	
        <div class="col-sm-8">    		
            <input class="form-control" type ="text " name ="lastname" id="<?php _t("Lastame"); ?>"/>
        </div>
    </div>	




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Birthdate"); ?></label>	
        <div class="col-sm-8">    		


            <div class="row">

                <div class="col-xs-2">
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



    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
    </div>      							

</form>

