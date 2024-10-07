<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_addresses_add">

    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Company"); ?></label>
        <div class="col-sm-8">                    
            <select class="selectpicker" data-live-search="true" data-width="100%" name="contact_id" >	
                <option value="0" ><?php _t("Select one"); ?></option>
                <?php
                //foreach (type_article_array() as $key => $value) {
                foreach (contacts_list() as $key => $value) {
                    $selected = ($value['id'] == invoices_field_id("client_id", $id) ) ? " selected " : "80";
                    echo "<option value=\"$value[id]\" $selected >$value[name]" . strtoupper($value['lastname']) . "</option>\n";
                }
                ?>
            </select>
        </div>	
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Type"); ?></label>
        <div class="col-sm-8">                    
            <select class="selectpicker" data-live-search="true" data-width="100%" name="name"  >	
                <option value="0" ><?php _t("Select one"); ?></option>
                <?php
                //foreach (type_article_array() as $key => $value) {
                foreach (addresses_name() as $value) {
                    $selected = ($value == 'Billing' ) ? " selected " : "80";

                    echo "<option value=\"$value\" $selected >$value</option>\n";
                }
                ?>
            </select>
        </div>	
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise ">
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    
            <input type="text"  name="region" class="form-control" id="region" placeholder="Region">
        </div>

        <div class="col-sm-3">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value[countryCode] == "BE") ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
