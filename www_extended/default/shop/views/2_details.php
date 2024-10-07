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






<h2><?php _t("Billing address"); ?></h2>

<?php
message('info', "You cant not edit address");
?>


<a name="next"></a>

<form class="form-horizontal" action="index.php" method="post" >
    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="" value="<?php echo "$ba[number]"; ?>" disabled="">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="" value="<?php echo "$ba[address]"; ?>" disabled="">
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="" value="<?php echo "$ba[postcode]"; ?>" disabled="">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="" value="<?php echo "$ba[barrio]"; ?>" disabled="">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" required="" value="<?php echo "$ba[city]"; ?>" disabled="">
        </div>
    </div>



    <div class="form-group">

        <label class="control-label col-sm-2" for="region"></label>
        <div class="col-sm-5">    

        </div>

        <div class="col-sm-8">    
            <select name="country" class="form-control selectpicker" data-live-search="true" data-width="100%" disabled="">
                <?php
                foreach (countries_list() as $key => $value) {

                    $selected = ($value['countryCode'] == "BE") ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next >>"); ?>">
        </div>      							
    </div>  
</form>



<?php include "00_footer.php"; ?>

