<h2><?php _t("Choose a place"); ?></h2>
<a name="order"></a>



<form class="form-horizontal" method="post" action="index.php">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_agenda_choose_place">
    <input type="hidden" name="agenda_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="2">



    <?php
    foreach ($offices as $key => $office) {

        echo '
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="address_id" id="address_id" value="' . $office['id'] . '" >
                                <h4>' . contacts_formated($office['id']) . '</h4>

                                <p>
                                    Av seis de diciembre y patria <br>
                                    17122 Conocoto Quito Pichincha <br>
                                    tel: 621 951 <br>
                                    

                                </p>

                            </label>
                        </div>
                    </div>
                </div>';
    }
    ?>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Sign in</button>
        </div>
    </div>
</form>



<hr>

<h3><?php _t("New place"); ?></h3>

<p>
    <?php _t("If it is not on the list, you can add a new place"); ?>
</p>


<?php include "form_offices_new.php"; ?>



<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="addressNewOk">   


    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Place name"); ?></label>
        <div class="col-sm-8">    
            <input type="text" class="form-control" name="">
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
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>" required="">
        </div>

        <div class="col-sm-3">    
            <select class="form-control" name="province">
                <option value="">Select one</option>
                <?php
                foreach (country_provinces_list_by_country($config_country) as $key => $province) {
                    echo '<option value="' . $province['province'] . '">' . $province['province'] . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="col-sm-3">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Barrio"); ?></label>
        <div class="col-sm-8">    
            <input type="text" class="form-control" name="">
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Reference"); ?></label>
        <div class="col-sm-8">    
            <textarea class="form-control" name="" rows="5"></textarea>
        </div>
    </div>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""><?php _t("Como llegar?"); ?></label>
        <div class="col-sm-8">    
            <textarea class="form-control" name="" rows="5"></textarea>
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

                    $selected = ($value[countryCode] == "EC") ? " selected " : "";

                    echo "<option value=\"$value[countryCode]\" $selected >" . utf8_decode($value['countryName']) . "</option>";
                }
                ?>
            </select>
        </div>
    </div>





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
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  
</form>