<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add_company');
}
?>



<form class="form-horizontal" action ="index.php" method ="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_provider_add">
    <input type="hidden" name="redi" value="3">


    <br>
    <?php
    /*


      <div class="row form-group">
      <label class="control-label col-sm-2" for="postcode"><?php _t("Birthdate") ; ?></label>
      <div class="col-sm-2">
      <select class="form-control" name="day" >
      <option></option>
      <?php
      for ( $i = 1 ; $i <= 31 ; $i ++ ) {
      echo "<option value=\"$i\">$i</option>" ;
      }
      ?>

      </select>
      </div>

      <div class="col-sm-2">
      <select class="form-control" name="month" >
      <option></option>
      <?php
      for ( $i = 1 ; $i <= 12 ; $i ++ ) {

      echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>" ;
      }
      ?>

      </select>
      </div>

      <div class="col-sm-4">
      <select class="form-control" name="year" >
      <option></option>
      <?php
      for ( $i = 1900 ; $i <= date("Y") ; $i ++ ) {
      // $selected = ($i == date("Y")-20 )? " selected ": "";
      echo "<option value=\"$i\">$i</option>" ;
      }
      ?>
      </select>
      </div>
      </div>

     */
    ?>

    <div class="form-group">
        <label class="control-label col-sm-2" for="companyName"><?php _t("Company name"); ?></label>
        <div class="col-sm-8">    
            <input type="text"  
                   name="companyName" 
                   class="form-control" 
                   id="companyName" 
                   placeholder="<?php _t("Company ABC"); ?>" 
                   value="<?php echo (isset($company_cloud)) ? $company_cloud["name"] : null; ?>"
                   required=""
                   >
        </div>     
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for="tva"></label>
        <div class="col-sm-2">                

            <select class="form-control selectpicker" data-live-search="true" name="prefixe_vat">    

                <option ><?php _t("Tva"); ?></option>
                <?php
                foreach (countries_list() as $key => $country_item) {
                    $selected = ($country_item['countryCode'] == addresses_billing_by_contact_id($u_owner_id)['country']) ? " selected " : "";
                    // echo '<option value="' . $country_item['countryCode'] . '" ' . $selected . '>' . $country_item['countryCode'] . ' - ' . _tr($country_item['countryName']) . '</option>';
                }
                ?>
            </select>

        </div>


        <div class="col-sm-6">    
            <input 
                type="text"  
                name="tva" 
                class="form-control" 
                id="tva" 
                placeholder="<?php _t("0123456789"); ?>" 
                value="<?php //echo (isset($company_cloud)) ? $company_cloud["tva"] : null;                  ?>"
                <?php //echo ($company_cloud["tva"]) ? ' readonly="" ' : '';     ?>
                >
        </div>
    </div>


    <?php
    /**
     *     <div class="form-group">

      <label class="control-label col-sm-2" for="name"><?php _t("Contact"); ?></label>
      <div class="col-sm-2">
      <select class="form-control" name="title">
      <?php
      foreach (contacts_titles_list() as $key => $ct) {
      $selected = ($ct['title'] == $company_cloud['_title']) ? " selected " : "";
      ?>
      <option value="<?php echo $ct['title']; ?>" <?php echo $selected; ?>><?php echo _tr($ct['title']); ?></option>
      <?php } ?>
      </select>
      </div>

      <div class="col-sm-3">
      <input type="text"
      name="name"
      class="form-control"
      id="name"
      placeholder="<?php _t("Name"); ?>"
      value="<?php echo (isset($company_cloud)) ? $company_cloud["c_name"] : null; ?>"
      >
      </div>

      <div class="col-sm-3">
      <input
      type="text"
      name="lastname"
      class="form-control"
      id="lastname"
      placeholder="<?php _t("Lastname"); ?>"
      value="<?php echo (isset($company_cloud)) ? $company_cloud["lastname"] : null; ?>"

      >
      </div>
      </div>

     */
    ?>

    <hr>


    <?php
    /*    <div class="form-group">
      <label class="control-label col-sm-2" for="addressName"><?php _t("Address") ; ?></label>
      <div class="col-sm-8">
      <select  class="form-control" name="addressName">
      <?php
      // siempre sera billiing en la sede
      foreach ( addresses_name() as $addressName ) {

      $selected = ($addressName == "Billing" ) ? " selected " : "" ;

      if( $addressName == "Billing" ){
      echo '<option value="' . $addressName . '" ' . $selected . '>' . $addressName . '</option>' ;
      }


      }
      ?>
      </select>
      </div>
      </div>
     */
    ?>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input 
                type="text"  
                name="number" 
                class="form-control" id="number" placeholder="<?php _t("Number"); ?>" >
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="<?php _t("Address"); ?>" >
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Municipality"); ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>" >
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    
        </div>
        <div class="col-sm-8">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $country_item) {

                    $selected = ($country_item['countryCode'] == addresses_billing_by_contact_id($u_owner_id)['country']) ? " selected " : "";

                    echo "<option value=\"$country_item[countryCode]\" $selected >" . _tr($country_item['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>


    <?php if (permissions_has_permission($u_rol, "contacts", "create") && modules_field_module("status", "transport")) { ?> 

        <div class="form-group">
            <label class="control-label col-sm-2" for="transport_code"><?php _t('Transport'); ?></label>
            <div class="col-sm-3">    
                <select class="form-control" name="transport_code">
                    <?php foreach (transport_list() as $key => $transport) { ?>
                        <option value="<?php echo "$transport[code]" ?>">
                            <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>

    <?php } ?>

    <hr>












    <?php
    /*


      <div class="form-group">
      <label class="control-label col-sm-2" for="position"><?php _t("Position"); ?></label>
      <div class="col-sm-4">
      <input type="text"  name="position" class="form-control" id="contactName" placeholder="<?php _t("Position") ; ?>: <?php _t("Manager"); ?>, <?php _t("Secretary"); ?>, <?php _t("Employee"); ?>" value="Manager">
      </div>

      <div class="col-sm-4">
      <input type="text"  name="ref" class="form-control" id="ref" placeholder="<?php _t("Ref") ; ?>" value="Ref">
      </div>

      </div> */
    ?>



    <?php
    /**
     * 
      <div class="form-group">
      <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>
      <div class="col-sm-8">
      <input type="email"  name="email" class="form-control" id="email" placeholder="<?php _t("info@email.com"); ?>">
      </div>
      </div>
     */
    ?>


    <?php if (modules_field_module('status', 'audio')) { ?>
        <div class="row form-group">
            <label class="control-label col-sm-2" for="rol"><?php _t("System"); ?></label>
            <div class="col-sm-3">    
                <select class="form-control" name="rol">
                    <?php
                    foreach (rols_list() as $key => $rol) {
                        if ($rol['rango'] == $config_rango_max_for_labo) {
                            ?>
                            <option <?php echo $rol['rol']; ?>><?php echo $rol['rol']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-sm-5">    
                <input type="text" class="form-control" name="password" placeholder="<?php _t("Password"); ?>" value="">
            </div>
        </div>

    <?php } else { ?>



    <?php } ?>



    <?php /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="email"></label>
      <div class="col-sm-2">
      <select class="form-control">
      <option><?php _t("Email"); ?></option>
      </select>

      </div>


      <div class="col-sm-6">
      <input type="text"  name="email" class="form-control" id="email" placeholder="" >
      </div>
      </div>
     */ ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Contact"); ?></label>
        <div class="col-sm-2">    
            <select class="form-control" name="title">
                <?php foreach (contacts_titles_list() as $key => $value) { ?>
                    <option value="<?php echo $value['title']; ?>"><?php echo _tr($value['title']); ?></option>
                <?php } ?>
            </select>     
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name"); ?>" >            
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname"); ?>" >
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>
        <div class="col-sm-8">
            <input type="email"  name="email" class="form-control" id="email" placeholder="<?php _t("info@email.com"); ?>">
        </div>
    </div>

    <hr>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default">
                <?php _t("Add provider"); ?>
            </button>
        </div>      							
    </div> 



</form>

