<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_offices_new">    

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Office name"); ?></label>
        <div class="col-sm-8">    
            <input type="text" class="form-control" name="officeName" id="officeName"  placeholder="<?php echo _t("Office name"); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Type of address"); ?></label>
        <div class="col-sm-8">    

            <?php // vardump($address); ?>

            <select  class="form-control" name="name">
                <?php
                foreach (addresses_name() as $addressName) {

                    //    $selected = ($addressName == $address['name'] ) ? " selected " : "";

                    if (strtolower($addressName) == "billing") {
                        echo '<option value="' . $addressName . '"  disabled>' . _tr($addressName) . ' (' . _tr("Only headoffice") . ')</option>';
                    } else {
                        echo '<option value="' . $addressName . '" >' . _tr($addressName) . '</option>';
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
            <input type="text"  name="address" class="form-control" id="address" placeholder="<?php _t("Address"); ?>" required="">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php echo _t("Postal code"); ?>" required="">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Municipality"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("Ciudad"); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    

        </div>

        <div class="col-sm-8">  

            <?php
            //vardump(offices_country_headoffice($u_owner_id));
            ?>
            <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%">
                <?php
                foreach (countries_list() as $key => $value) {

                    //$selected = ($value[countryCode] == "BE") ? " selected " : "" ;

                    $selected = ($value['countryCode'] == offices_country_headoffice($u_owner_id) ) ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
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


      <div class="form-group">
      <label class="control-label col-sm-2" for=""><?php _t("Telephone") ; ?></label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="data" id="tel"  placeholder="<?php echo _t("+32123456"); ?>">
      </div>
      </div>

     */
    ?>



    <?php
    /*

      <div class="form-group">
      <label class="control-label col-sm-2" for=""><?php _t("E-mail") ; ?></label>
      <div class="col-sm-8">
      <input type="email" class="form-control" name="email" id="email"  placeholder="<?php echo _t("info@mail.com"); ?>">
      </div>
      </div>

     */
    ?>


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


</form>




