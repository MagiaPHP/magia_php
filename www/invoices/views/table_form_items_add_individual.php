<?php
//
$imputs = array(
    array("type" => "hidden", "name" => "c", "id" => "c", "value" => "invoices"),
    array("type" => "hidden", "name" => "a", "id" => "a", "value" => "ok_linesAddIndividual"),
    array("type" => "hidden", "name" => "invoice_id", "id" => "invoice_id", "value" => "$id"),
    array("type" => "hidden", "name" => "redi", "id" => "redi", "value" => "1"),
);

echo (form($imputs));
?>
<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
    <td></td>
    <td colspan="10">
        <input 
            type="text"
            min="1"
            name="quantity" 
            class="form-control" 
            placeholder="<?php _t("Quantity"); ?>"
            value="1"
            size="50" required="">
    </td>
</tr>



<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
    <td></td>
    <td colspan="10">
        <input 
            type="text" 
            name="description" 
            class="form-control" 
            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_invoices_description_maxlength"); ?> <?php _t("characters"); ?>)" 
            autofocus=""
            value="" required=""
            <?php
            // limita los caracteres a x cuando esta activado web 
            // config/controllers/invoices_description_maxlength.php
            if (modules_field_module('status', 'audio')) {
                ?>
                maxlength="<?php echo _options_option("config_invoices_description_maxlength"); ?>"
            <?php } ?>            
            >
    </td>    
</tr>


<tr>
    <?php if (modules_field_module('status', 'products') || modules_field_module('status', 'audio')) { ?> <td></td> <?php } ?>                                    
    <td></td>
    <td>        
        <input  
            type="number" 
            name="price" 
            required=""
            min="0" 
            value="" 
            step=.01
            class="form-control" 
            placeholder="<?php _t("Price"); ?>"
            value="">                    
    </td>

    <td>


        <?php
        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
        ?>

        <select class="form-control" name="tax">
            <?php if ($tax_by_country) { ?>
                <?php foreach ($tax_by_country as $tax) { ?> 

                    <?php //$selected = ($tax['tax'] == $item['tva']) ? " selected " : " "; ?>                                                                

                    <option 
                        value="<?php echo $tax['tax']; ?>" 
                        <?php //echo "$selected"; ?>>
                        <?php echo $tax['tax']; ?>%
                    </option>

                <?php } ?>
            <?php } else { ?> 
                <option value="0">0%</option>
            <?php } ?>
        </select>

    </td>

    <td>        
        <input 
            type="number" 
            name="discounts"  
            class="form-control" 
            placeholder="<?php _t("Discount"); ?>"
            value="<?php echo contacts_field_id('discounts', invoices_field_id("client_id", $id)) ?>"
            >        
    </td>


    <td>
        <select class="form-control" name="discounts_mode">
            <?php foreach (discounts_mode_list() as $key => $value) { ?>
                <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
            <?php } ?>                                           
        </select>
    </td>


    <td>
        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
            </div>
        </div>
    </td>


</form>

<?php if (modules_field_module('status', 'audio')) { ?>

    <td>
        <div class="row">
            <div class="col-xs-12">
                <?php include "modal_products_search.php"; ?>
            </div>
        </div>
    </td>

<?php } else { ?>

    <td>

    </td>

<?php } ?>   

<td></td>
<td></td>
<td></td>



<td>
    <div class="row">
        <div class="col-xs-12">




            <?php
            include "modal_add_separator.php";
            ?>






        </div>
    </div>
</td>


</tr>



