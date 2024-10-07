<div class="form-group">
    <label class="control-label col-sm-2" for=""><?php _t("Office"); ?></label>
    <div class="col-sm-8">    
        <input type="text"  name="" class="form-control" id="" placeholder="" readonly="" value="<?php echo contacts_formated($id); ?>">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for=""><?php echo _t("Type of address"); ?></label>
    <div class="col-sm-8">    
        <select  class="form-control" name="name">
            <?php
            foreach (addresses_name() as $addressName) {

                //    $selected = ($addressName == $address['name'] ) ? " selected " : "";

                if (strtolower($addressName) == "billing" && (!contacts_is_headoffice($id) || addresses_billing_by_contact_id($id) )) {

                    echo '<option value="' . $addressName . '"  disabled>' . $addressName . ' (' . _tr('Only headoffice and only one') . ' ) </option>';
                } else {
                    echo '<option value="' . $addressName . '" >' . $addressName . '</option>';
                }
            }
            ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
    <div class="col-sm-2">    
        <input type="text"  name="number" class="form-control" id="number" placeholder="<?php echo _t("Number"); ?>">
    </div>
    <div class="col-sm-6">    
        <input type="text"  name="address" class="form-control" id="address" placeholder="<?php echo _t("Address"); ?>" required="">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="postcode"></label>
    <div class="col-sm-2">    
        <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php echo _t("Postal code"); ?>" required="">
    </div>

    <div class="col-sm-3">    
        <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php echo _t("Municipality"); ?>">
    </div>

    <div class="col-sm-3">    
        <input 
            type="text"  
            name="city" 
            class="form-control" 
            id="city" 
            placeholder="<?php echo _t("City"); ?>"

            >
    </div>
</div>

<div class="form-group">
    <label class="control-label col-sm-2" for="region"></label>
    <div class="col-sm-5">    
    </div>
    <!-- 1020 -->
    <div class="col-sm-8">    
        <select 
            name="country" 
            class="form-control selectpicker" 
            data-live-search="true" 
            data-width="100%"
            >
                <?php
                foreach (countries_list() as $key => $value) {

                    $countryCode = $value['countryCode'];
                    $countryName = $value['countryName'];

//                $selected = ($value[countryCode] == "BE") ? " selected " : "";

                    $selected = ($countryCode == offices_country_headoffice($u_owner_id) ) ? " selected " : "";

                    echo "<option value=\"$countryCode\" $selected >" . utf8_decode($countryName) . "</option>";
                }
                ?>
        </select>
    </div>
</div>
<!-- 1030 -->
<?php
/*
  <hr>



  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Telephone"); ?></label>
  <div class="col-sm-2">
  <input type="text"  name="tel_name" class="form-control" id="tel_name" placeholder="Office">
  </div>
  <div class="col-sm-6">
  <input type="text"  name="tel_data" class="form-control" id="tel_data" placeholder="+322621951">
  </div>
  </div>


 */
?>
<!-- 1040 -->

<div class="form-group">
    <label class="control-label col-sm-2" for="postcode"><?php _t('Transport'); ?></label>
    <div class="col-sm-8">    
        <select class="form-control" name="transport_code">
            <?php foreach (transport_list() as $key => $transport) { ?>
                <option value="<?php echo "$transport[code]" ?>">
                    <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                </option>
            <?php } ?>
        </select>
    </div>
</div>


<div class="form-group">
    <label class="control-label col-sm-2" for=""></label>
    <div class="col-sm-8">    
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
    </div>      							
</div>  