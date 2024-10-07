<form method="post" action="index.php">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_linesAddIndividual">
    <input type="hidden" name="invoice_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <label for="quantity"><?php _t("Quantity"); ?></label>
        <input 
            type="number"
            min="1"
            name="quantity" 
            id="quantity" 
            class="form-control" 
            placeholder="<?php _t("Quantity"); ?>"
            value="1"
            size="50" required="">
    </div>

    <div class="form-group">
        <label for="description"><?php _t("Description"); ?></label>

        <textarea 
            class="form-control" 
            name="description" 
            id='description'
            <?php
            // limita los caracteres a x cuando esta activado web 
            // config/controllers/invoices_description_maxlength.php
            if (modules_field_module('status', 'audio')) {
                ?>
                maxlength="<?php echo _options_option("config_invoices_description_maxlength"); ?>"
            <?php } ?>

            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_invoices_description_maxlength"); ?> <?php _t("characters"); ?>)" 
            rows='5'
            ></textarea>


    </div>



    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
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
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label for="tax"><?php _t("Tax"); ?></label>
            <?php
            $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
            ?>

            <select class="form-control" name="tax" id="tax">
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
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label for="discounts"><?php _t("Discounts"); ?></label>

            <input
                type="number"
                name="discounts"
                id="discounts"
                class="form-control"
                min="0"
                max=""
                placeholder="<?php _t("Discount"); ?>"
                value="<?php echo contacts_field_id('discounts', invoices_field_id("client_id", $id)) ?>"
                >
        </div>


        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <label for="discounts"><?php _t("Discounts mode"); ?></label>
            <select class="form-control" name="discounts_mode">
                <?php foreach (discounts_mode_list() as $key => $value) { ?>
                    <option value="<?php echo $value['discount']; ?>"><?php echo $value['discount']; ?></option>
                <?php } ?>
            </select>
        </div>
    </div>



    <p>
        <?php
        if (contacts_field_id('discounts', invoices_field_id("client_id", $id))) {
            message('info', "This customer has a registered default discount");
        }
        ?>
    </p>






    <div class="row">
        <div class="col-xs-12">
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-plus"></span>
                <?php _t("Add"); ?>
            </button>
        </div>
    </div>


</form>

