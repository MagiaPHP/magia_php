
<form action="index.php" method="get">
    <input type="hidden"  name="c" value="budgets">
    <input type="hidden"  name="a" value="ok_lines_edit">
    <input type="hidden"  name="id" value="<?php echo $line->getId(); ?>">
    <input type="hidden"  name="redi[redi]" value="1">


    <?php
    if (modules_field_module('status', 'products')) {
        ?>
        <div class="form-group">
            <label for="code"><?php _t("Code"); ?></label>
            <input 
                type="" 
                name="code" 
                class="form-control" 
                id="code" 
                placeholder="<?php echo $line->getCode(); ?>" value="<?php echo $line->getCode(); ?>">
        </div>
        <?php
    } else {
        ?>
        <input type="hidden"  name="code" value="null">
        <?php
    }
    ?>

    <div class="form-group">
        <label for="quantity"><?php _t("Quantity"); ?></label>
        <input 
            type="number" 
            min="1"
            name="quantity" 
            class="form-control" 
            id="quantity" 
            placeholder="<?php echo $line->getQuantity(); ?>" value="<?php echo $line->getQuantity(); ?>">
    </div>


    <div class="form-group">
        <label for="description"><?php _t("Description"); ?></label>


        <textarea 
            class="form-control" 
            name='description' 
            id="description"
            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_budgets_description_maxlength"); ?> <?php _t("characters"); ?>)" 
            autofocus=""
            value="" 
            required=""
            rows='5'
            maxlength='<?php echo _options_option("config_budgets_description_maxlength"); ?>'
            ><?php echo $line->getDescription(); ?></textarea>



    </div>


    <div class="form-group">
        <label for="price"><?php _t("Price"); ?></label>
        <input 
            type="number" 
            name="price" 
            min="0"
            class="form-control" 
            id="price" 
            step="any"
            placeholder="<?php echo $line->getPrice(); ?>" 
            value="<?php echo $line->getPrice(); ?>">
    </div>



    <div class="form-group">
        <label for="tax"><?php _t("Tva"); ?></label>

        <?php
        //vardump($budgets['client_id']);

        $tax_by_country = country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']);
        ?>

        <select class="form-control" name="tax">
            <?php if ($tax_by_country) { ?>
                <?php foreach ($tax_by_country as $tax) { ?>                                                                
                    <?php $selected = ($tax['tax'] == $line->getTax()) ? " selected " : " "; ?>                                                                
                    <option 
                        value="<?php echo $tax['tax']; ?>" 
                        <?php echo "$selected"; ?>>
                        <?php echo $tax['tax']; ?>%
                    </option>
                <?php } ?>
            <?php } else { ?> 
                <option value="0">0%</option>                              
            <?php } ?>
        </select>


    </div>

    <div class="form-group">
        <label for="discounts"><?php _t("Discount"); ?></label>
    </div>


    <div class="row form-group">
        <div class="col-xs-3">

            <input 
                type="number" 
                name="discounts" 
                class="form-control" 
                id="discounts" 
                placeholder="<?php echo $line->getDiscounts(); ?>" 
                value="<?php echo $line->getDiscounts(); ?>">
        </div>

        <div class="col-xs-4">
            <select class="form-control" name="discounts_mode">
                <?php foreach (discounts_mode_list() as $key => $value) { ?>

                    <option 
                        value="<?php echo $value['discount']; ?>" 
                        <?php echo ($line->getDiscounts_mode() == $value['discount']) ? " selected " : ""; ?>>
                            <?php echo $value['discount']; ?>
                    </option>

                <?php } ?>                                           
            </select>
        </div>
    </div>



    <?php if (modules_field_module('status', 'budgets')) { ?>
        <div class="form-group">
            <label for="" class="" for="category_code"><?php _t("Category"); ?></label>
            <select 
                class="form-control selectpicker" 
                data-live-search="true"
                name="category_code"
                id="category_code"
                >
                <option value="null"><?php _t("Without category"); ?></option>
                <?php
                $selected = null;
                foreach (budgets_categories_list2() as $key => $ecl) {
                    // el ultimo categoria registrada
                    //    $selected = ($ecl['code'] == $budget_items['category_code']) ? " selected " : "";

                    $selected = ($ecl['code'] == $line->getCategory_code()) ? " selected " : "";

                    $has_child = (budgets_categories_childrens_of($ecl['code'])) ? true : false;
                    if (!$has_child) {
                        echo '<option value="' . $ecl['code'] . '"  ' . $selected . '>' . $ecl['code'] . ' ' . $ecl['category'] . '</option>';
                    }
                    $selected = null;
                }
                ?>
            </select>

        </div>
    <?php } ?>






    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>       