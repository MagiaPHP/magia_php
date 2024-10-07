<?php include "00_header.php"; ?>


<?php // include "nav_address.php"; ?>
<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php _t("Delvery address"); ?></h2>

<p>
    <?php _t("What is the address of your company"); ?>
</p>


<a name="next"></a>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_123">
    <input type="hidden" name="name" value="<?php echo addresses_name()[1]; ?>">



    <?php
// vardump(addresses_name()[1]);
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for=""></label>
      <div class="col-sm-8">
      <select  class="form-control" name="name">
     */
    ?>    


    <?php /*
      foreach ( addresses_name() as $addressName ) {

      $selected = ($addressName == $address['name'] ) ? " selected " : "" ;

      echo '<option value="' . $addressName . '" ' . $selected . '>' . $addressName . '</option>' ;
      } */
    ?>


    <?php /*
      <option value="Billing"><?php _t("Billing"); ?></option>
      </select>
      </div>

      </div>
     * 
     * 
     */ ?>






    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="" >
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="" >
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="" >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="" >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles">
        </div>
    </div>



    <div class="form-group">

        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    

        </div>

        <div class="col-sm-8">    
            <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value['countryCode'] == "BE") ? " selected " : "";

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


     */
    ?>

    <?php
    /*
      <div class="form-group">
      <label class="control-label col-sm-2" for="postcode"><?php _t('Transport') ; ?></label>
      <div class="col-sm-8">
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


            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk"></span>
                <?php _t("Save"); ?>
            </button>

        </div>      							
    </div>  
</form>







<?php
if (!$error) {
    shop_registre_next(13);
}
?>





<?php include "00_footer.php"; ?>