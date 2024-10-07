<?php include "00_header.php"; ?>


<?php
// Gestion de mensajes cortos
sms($sms);

if ($error && $sms) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>


<h2><?php _t("Billing address"); ?></h2>

<p>
    <?php _t("Address of your company"); ?>
</p>


<a name="next"></a>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_12">



    <div class="form-group">
        <label class="control-label col-sm-3" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-3">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="" 
                   value="<?php echo $company->getAddresses('Billing')->getNumber(); ?>"
                   >
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="" 
                   value="<?php echo $company->getAddresses('Billing')->getAddress(); ?>"
                   >
        </div>
    </div>


    <div class="form-group">
        <label class="control-label col-sm-3" for="postcode"></label>
        <div class="col-sm-3">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="" 
                   value="<?php echo $company->getAddresses('Billing')->getPostcode(); ?>"

                   >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="" 
                   value="<?php echo $company->getAddresses('Billing')->getBarrio(); ?>"

                   >
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles"
                   value="<?php echo $company->getAddresses('Billing')->getCity(); ?>"
                   >
        </div>
    </div>



    <div class="form-group">

        <label class="control-label col-sm-3" for="region"></label>

        <div class="col-sm-5">    
            <input type="hidden" name="region"
                   value="<?php echo $company->getAddresses('Billing')->getRegion(); ?>"
                   >
        </div>



        <div class="col-sm-9">    
            <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value['countryCode'] == $company->getAddresses('Billing')->getCountry()) ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
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
