<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add_contact');
}
?>


<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_add_contact_without_owner">
    <input type="hidden" name="position" value="Manager">
    <input type="hidden" name="ref" value="ref">
    <input type="hidden" name="addressName" value="Billing">
    <input type="hidden" name="day" value="01">
    <input type="hidden" name="month" value="01">
    <input type="hidden" name="year" value="1900">
    <input type="hidden" name="redi" value="5">


    <br>

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
            <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name"); ?>" required="" >            
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname"); ?>" required="">
        </div>
    </div>





    <div class="form-group">
        <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>
        <div class="col-sm-8">
            <input type="email"  name="email" class="form-control" id="email" placeholder="<?php _t("info@email.com"); ?>">
        </div>
    </div>

    <hr>

    <?php
    /*


      <div class="row form-group">
      <label class="control-label col-sm-2" for="postcode"><?php _t("Birthdate") ; ?></label>
      <div class="col-sm-2">
      <select class="form-control" name="day" required="">
      <option></option>
      <?php
      for ( $i = 1 ; $i <= 31 ; $i ++ ) {
      echo "<option value=\"$i\">$i</option>" ;
      }
      ?>

      </select>
      </div>

      <div class="col-sm-2">
      <select class="form-control" name="month" required="">
      <option></option>
      <?php
      for ( $i = 1 ; $i <= 12 ; $i ++ ) {

      echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>" ;
      }
      ?>

      </select>
      </div>

      <div class="col-sm-4">
      <select class="form-control" name="year" required="">
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
        <label class="control-label col-sm-2" for=""><?php _t("Billing Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="<?php _t("Number"); ?>" >
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
                foreach (countries_list() as $key => $value) {

                    $selected = ($value['countryCode'] == "BE") ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
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
    /*
      <div class="row form-group">
      <label class="control-label col-sm-2" for="rol"><?php _t("System") ; ?></label>
      <div class="col-sm-2">
      <select class="form-control" name="rol">
      <?php foreach ( rols_list() as $key => $rol ) {
      if($rol['rango'] == $config_rango_max_for_labo ){ ?>
      <option <?php echo $rol['rol']; ?>><?php echo $rol['rol']; ?></option>
      <?php } } ?>
      </select>
      </div>

      <div class="col-sm-3">
      <input type="email" class="form-control" name="email" placeholder="E-mail" required="">
      </div>


      <div class="col-sm-3">
      <input type="text" class="form-control" name="password" placeholder="password" value="<?php echo magia_uniqid(); ?>">
      </div>
      </div> */
    ?>




    <?php
    /*
      foreach (directory_names_list() as $key => $dn) {



      if (in_array($dn['name'], array('Tel', 'GSM', 'Email'))) {
      echo '
      <div class="form-group">
      <label class="control-label col-sm-2" for="' . $dn['name'] . '"></label>
      <div class="col-sm-2">
      ' . $dn['name'] . '
      </div>
      <div class="col-sm-6">
      <input type="text"  name="' . $dn['name'] . '" class="form-control" id="' . $dn['name'] . '" placeholder="' . $dn['name'] . '" >
      </div>
      </div>
      ';
      }
      }
     * 
     */
    ?>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Create the invoice"); ?>">
        </div>      							
    </div>  

</form>




<?php /*

  <form class="form-horizontal"  action ="index.php" method ="post" >

  <input type="hidden" name="c" value="contacts">
  <input type="hidden" name="a" value="ok_add_contact_without_owner">
  <input type="hidden" name="owner_id" value="<?php echo $id ; ?>">








  <div class="form-group">

  <label class="control-label col-sm-2" for="name"><?php _t("Contact"); ?></label>
  <div class="col-sm-2">
  <select class="form-control" name="title">
  <?php foreach ( contacts_titles_list() as $key => $value ) { ?>
  <option value="<?php echo $value['title']; ?>"><?php echo _tr($value['title']); ?></option>
  <?php } ?>
  </select>
  </div>

  <div class="col-sm-3">
  <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name") ; ?>" required="">
  </div>






  <div class="col-sm-3">
  <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname") ; ?>" required="">
  </div>
  </div>





  <div class="row form-group">
  <label class="control-label col-sm-2" for="postcode"><?php _t("Birthdate") ; ?></label>
  <div class="col-sm-2">
  <select class="form-control" name="day" required="">
  <option></option>
  <?php
  for ( $i = 1 ; $i <= 31 ; $i ++ ) {
  echo "<option value=\"$i\">$i</option>" ;
  }
  ?>

  </select>
  </div>

  <div class="col-sm-2">
  <select class="form-control" name="month" required="">
  <option></option>
  <?php
  for ( $i = 1 ; $i <= 12 ; $i ++ ) {

  echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>" ;
  }
  ?>

  </select>
  </div>

  <div class="col-sm-4">
  <select class="form-control" name="year" required="">
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


  <hr>


  <div class="form-group">
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

  <div class="form-group">
  <label class="control-label col-sm-2" for=""><?php _t("Address") ; ?></label>
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
  foreach ( countries_list() as $key => $value ) {

  $selected = ($value['countryCode'] == "BE") ? " selected " : "" ;

  echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>" ;
  }
  ?>
  </select>
  </div>
  </div>



  <hr>






  <div class="form-group">
  <label class="control-label col-sm-2" for="email"><?php _t("Email"); ?></label>


  <div class="col-sm-8">
  <input type="email"
  name="email"
  class="form-control"
  id="email"
  placeholder="info@factux.eu"

  >
  </div>
  </div>






  <div class="form-group">
  <label class="control-label col-sm-2" for="telephone"><?php _t("Telephone"); ?></label>



  <div class="col-sm-8">
  <input type="text"
  name="telephone"
  class="form-control"
  id="telephone"
  placeholder="+32474624707"

  >
  </div>
  </div>




  <div class="form-group">
  <label class="control-label col-sm-2" for="transport_code"><?php _t('Transport') ; ?></label>
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




  <hr>





  <div class="form-group">
  <label class="control-label col-sm-2" for="position"><?php _t("Company"); ?></label>
  <div class="col-sm-4">
  <input type="text"  name="position" class="form-control" id="contactName" placeholder="<?php _t("Position") ; ?>: <?php _t("Manager"); ?>, <?php _t("Secretary"); ?>, <?php _t("Employee"); ?>" value="">
  </div>

  <div class="col-sm-4">
  <input type="text"  name="ref" class="form-control" id="ref" placeholder="<?php _t("Ref") ; ?>" value="">
  </div>

  </div>



  <div class="row form-group">
  <label class="control-label col-sm-2" for="rol"><?php _t("System") ; ?></label>
  <div class="col-sm-2">
  <select class="form-control" name="rol">
  <?php foreach ( rols_list() as $key => $rol ) {
  if($rol['rango'] == $config_rango_max_for_labo ){ ?>
  <option <?php echo $rol['rol']; ?>><?php echo $rol['rol']; ?></option>
  <?php } } ?>
  </select>
  </div>

  <div class="col-sm-3">
  <input type="email" class="form-control" name="email" placeholder="E-mail" required="">
  </div>

  <div class="col-sm-3">
  <input type="text" class="form-control" name="password" placeholder="password" value="<?php echo magia_uniqid(); ?>">
  </div>
  </div>


  <div class="form-group">
  <label class="control-label col-sm-2" for=""></label>
  <div class="col-sm-8">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save") ; ?>">
  </div>
  </div>









  <div class="form-group">
  <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add") ; ?>">
  </div>

  </form>
 * 
 */ ?>