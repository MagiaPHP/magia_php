<?php vardump($arg); ?>
<form class="form-horizontal"  action ="index.php" method ="post" >

    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="ok_add">
    
    <input type="hidden" name="contact_id" value="<?php echo isset($arg["contact_id"]) ? $arg["contact_id"] : false; ?>">
    
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"] ?? 1; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

    <div class="form-group">       
        <div class="col-sm-4">    
            <input type="text"  name="number" class="form-control" id="number" placeholder="<?php _t("Number"); ?>" >
        </div>
        <div class="col-sm-8">    
            <input type="text"  name="address" class="form-control" id="address" placeholder="<?php _t("Address"); ?>" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-4">    
            <input type="text"  name="postcode" class="form-control" id="postcode" placeholder="<?php _t("Postal code"); ?>">
        </div>
        <div class="col-sm-4">    
            <input type="text"  name="barrio" class="form-control" id="barrio" placeholder="<?php _t("Municipality"); ?>">
        </div>
        <div class="col-sm-4">    
            <input type="text"  name="city" class="form-control" id="city" placeholder="<?php _t("City"); ?>" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-12">    
            <select class="form-control" name="country">
                <?php
                foreach (countries_list() as $key => $country_item) {
                    $selected = ($country_item['countryCode'] == addresses_billing_by_contact_id(u_owner_id())['country']) ? " selected " : "";
                    echo "<option value=\"$country_item[countryCode]\" $selected >" . _tr($country_item['countryName']) . "</option>";
                }
                
                ?>
            </select>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <div class="col-sm-12">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>  

</form>

<br>

<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_contacts_contacts_add');
}
?>



