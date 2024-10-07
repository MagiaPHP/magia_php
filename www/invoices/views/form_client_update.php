<form method="post" action="index.php">

    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_client_update">
    <input type="hidden" name="id" value="<?php echo $invoices['id']; ?>">

    <div class="form-group">
        <label for="contact"><?php _t("Company name"); ?></label>

        <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
            <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                    <?php
                    foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                        $selected = ($invoices['client_id'] == $contacts_list['id'] ) ? " selected " : "";
                        // no se muestra la emrpea 1022
                        // osea la empresa que factura
                        if ($contacts_list['id'] != _options_option('default_id_company')) {
                            ?>
                            <option value="<?php echo "$contacts_list[id]"; ?>" <?php echo $selected; ?>>
                                <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </optgroup>
            <?php } ?>
        </select>


    </div>









    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>




<?php /**

  <form method="post" action="index.php">

  <input type="hidden" name="c" value="invoices">
  <input type="hidden" name="a" value="ok_change_delivery_address">
  <input type="hidden" name="id" value="<?php echo $id ; ?>">

  <div class="form-group">
  <label class="control-label col-sm-2" for="client_id"><?php _t("Cliente_id") ; ?></label>
  <div class="col-sm-8">

  <select class="form-control selectpicker" data-live-search="true" name="new_adress_id" required="">


  <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
  <?php foreach ( contacts_list_according_company_and_type($invoices['client_id'], 1) as $key => $offices ) { ?>

  <optgroup label="<?php echo contacts_formated($offices['id']); ?>">

  <?php foreach ( addresses_delivery_by_contact_id($offices['id']) as $key => $delivery_address ) { ?>

  <option value="<?php echo "$delivery_address[id]" ; ?>">
  <?php echo "$delivery_address[number], $delivery_address[address] - $delivery_address[postalcode] $delivery_address[barrio] $delivery_address[city] $delivery_address[country]  "; ?>
  </option>

  <?php }?>

  </optgroup>

  <?php } ?>
  </select>



  </div>
  </div>




  <?php
  //$owner_id = contacts_field_id("owner_id" , $invoices['client_id']) ;

  foreach ( addresses_delivery_by_contact_id($invoices['client_id']) as $key => $addresses_delivery_by_contact_id ) {

  $checked = ( $addresses_delivery['id'] == $addresses_delivery_by_contact_id['id'] ) ? " checked " : "" ;
  ?>







  <div class="radio">
  <label>

  <input type="radio" name="new_adress_id" id="new_adress_id" value="<?php echo "$addresses_delivery_by_contact_id[id]" ; ?>" <?php echo $checked ; ?> >

  <?php
  echo "$addresses_delivery_by_contact_id[number], $addresses_delivery_by_contact_id[address] - "
  . "$addresses_delivery_by_contact_id[postcode] - $addresses_delivery_by_contact_id[barrio] "
  . "$addresses_delivery_by_contact_id[city] $addresses_delivery_by_contact_id[country]" ;
  ?>
  </label>
  </div>

  <?php } ?>

  <button type="submit" class="btn btn-default"><?php _t("Change") ; ?></button>
  </form>


 */ ?>