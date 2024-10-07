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



<h2><?php _t("Delivery address"); ?></h2>



<a name="next"></a>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_3_edit">   
    <input type="hidden" name="id" value="<?php echo $da['id']; ?>">   
    <input type="hidden" name="name" value="<?php echo $da['name']; ?>">   
    <input type="hidden" name="region" value="<?php echo $da['region']; ?>">   






    <div class="form-group">
        <label class="control-label col-sm-2" for="office_name"><?php _t("Office name"); ?></label>
        <div class="col-sm-8">    
            <input 
                type="text"  
                name="office_name" 
                class="form-control" 
                id="office_name" 
                placeholder="" 
                required="" 
                value="<?php echo $office_name; ?>"
                <?php
                // si es sede esto esta desactivado
                if ($office_id_work_for == $office_id_work_at) {
                    echo " readonly ";
                }
                ?>

                >
        </div>                                
    </div>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Address"); ?></label>
        <div class="col-sm-2">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="Number" required="" value="<?php echo $da["number"]; ?>">
        </div>
        <div class="col-sm-6">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="Av. Louise" required="" value="<?php echo $da["address"]; ?>">
        </div>
    </div>






    <div class="form-group">
        <label class="control-label col-sm-2" for="postcode"></label>
        <div class="col-sm-2">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="1050" required="" value="<?php echo $da["postcode"]; ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="Ixelles" required="" value="<?php echo $da["barrio"]; ?>">
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="Bruxelles" required="" value="<?php echo $da["city"]; ?>">
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

                    $selected_country = (
                            $value['countryCode'] == $da['country']

                            ) ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected_country >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>


    <hr>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Telephone"); ?></label>
        <div class="col-sm-0">
            <input type="hidden"  name="tel_name" class="form-control" id="tel_name" placeholder="Office">
        </div>
        <div class="col-sm-8">
            <input type="text"  name="tel_data" class="form-control" id="tel_data" placeholder="+322621951" value="<?php echo $tel; ?>">
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="transport"><?php _t('Transport'); ?></label>
        <div class="col-sm-8">    
            <select class="form-control" name="transport_code">
                <?php
                foreach (transport_list() as $key => $transport) {

                    $selected_transport = ($transport['code'] == $transport_code ) ? " selected " : "";
                    ?>
                    <option value="<?php echo "$transport[code]" ?>" <?php echo $selected_transport ?>>
                        <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" ></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  
</form>


<?php include "00_footer.php"; ?>

