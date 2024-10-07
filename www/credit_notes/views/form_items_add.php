

<form action="index.php" method="post">                                                                                              
    <input type="hidden" name="c" value="credit_notes"> 
    <input type="hidden" name="a" value="linesAddOk"> 
    <input type="hidden" name="credit_note_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="order_by" value="1"> 

    <div class="form-group">
        <label for="description"><?php _t("Description"); ?></label>
        <textarea 
            class="form-control" 
            name="description" 
            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_credit_notes_description_maxlength"); ?> <?php _t("characters"); ?>)"
            rows="5"
            required="true"
            ></textarea>
    </div>


    <div class="form-group">
        <label for="quantity"><?php _t("Quantity"); ?></label>
        <input type="number" name="quantity" id="quantity" class="form-control" placeholder="<?php _t("Quantity"); ?>" value="1">
    </div>

    <div class="form-group">
        <label for="price"><?php _t("Price"); ?></label>
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
    </div>





    <div class="form-group">
        <label for="tax"><?php _t("Tax"); ?></label>
        <select class="form-control" name="tax">

            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);

            foreach ($tax_by_country as $key => $tax) {
                ?>
                <option value="<?php echo "$tax[tax]"; ?>"><?php echo "$tax[tax] %"; ?></option>
            <?php } ?>

            <?php //tax_select("value", "value", $selected, $disabled);   ?>
        </select>
    </div>




    <div class="row">
        <div class="col-xs-12">
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus"></span>
                <?php _t("Add"); ?>
            </button>
        </div>
    </div>

</form>   

<br>

<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_items_add');
}
?>






