<form class="form-horizontal" action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_address_add">
    <input type="hidden" name="contact_id" value="<?php echo $invoices['client_id']; ?>">
    <input type="hidden" name="name" value="Billing">
    <input type="hidden" name="invoice_id" value="<?php echo $invoices['id']; ?>">
    <input type="hidden" name="redi" value="1">


    <?php
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for=""><?php _t("Type") ; ?></label>
      <div class="col-sm-8">
      <select  class="form-control" name="name">
      <?php
      foreach ( addresses_name() as $addressName ) {

      $selected = ($addressName == $address['name'] ) ? " selected " : "" ;

      if ( $addressName == "Billing" && ! contacts_is_headoffice($id) ) {
      echo '<option value="' . $addressName . '" ' . $selected . ' disabled>' . $addressName . ' (' . _tr('Only headoffice') . ')</option>' ;
      } else {
      echo '<option value="' . $addressName . '" ' . $selected . '>' . $addressName . '</option>' ;
      }
      }
      ?>
      </select>
      </div>
      </div> */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise " required="">
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
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" required="">
        </div>
    </div>



    <div class="form-group">

        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    

        </div>

        <div class="col-sm-8">  

            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = (offices_country_headoffice($id) == $value['countryCode']) ? " selected " : "";

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
      <label class="control-label col-sm-2" for="postcode"><?php _t('Transport') ; ?></label>
      <div class="col-sm-3">
      <select class="form-control" name="transport_code">
      <?php foreach ( transport_list() as $key => $transport ) { ?>
      <option value="<?php echo "$transport[code]" ?>">
      <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
      </option>
      <?php } ?>
      </select>
      </div>
      </div>


     */
    ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  

</form>
