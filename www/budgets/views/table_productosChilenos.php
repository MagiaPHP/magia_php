<table class="table tab-content">
    <thead>
        <tr>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Name"); ?></th>            
            <th><?php _t("Price"); ?></th>
            <th><?php _t("Tax"); ?></th>
            <th><?php _t("Quantity"); ?></th>
            <th><?php _t("Discount"); ?></th>
            <th><?php _t("Discount mode"); ?></th>            
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tbody>





        <?php
        // El descuento que tiene este cliente en sus pedidos 

        $discount = (clients_search_discount_by_client($budgets['client_id'])) ? clients_search_discount_by_client($budgets['client_id']) : 0;

        foreach (products_list() as $key => $item) {

            $code = "$item[code]";
            $name = "$item[name]";
            $price = "$item[price]";
            $tax = (isset($item['tax'])) ? $item['tax'] : 21;
            $description = "$name";
            ?>




            <?php
            //
            $imputs = array(
                array("type" => "hidden", "name" => "c", "id" => "c", "value" => "budgets"),
                array("type" => "hidden", "name" => "a", "id" => "a", "value" => "ok_linesAddIndividual"),
                array("type" => "hidden", "name" => "budget_id", "id" => "budget_id", "value" => "$id"),
                array("type" => "hidden", "name" => "code", "id" => "code", "value" => "$code"),
                array("type" => "hidden", "name" => "description", "id" => "description", "value" => "$description"),
                array("type" => "hidden", "name" => "price", "id" => "price", "value" => "$price"),
                array("type" => "hidden", "name" => "tax", "id" => "tax", "value" => "$tax"),
                array("type" => "hidden", "name" => "redi", "id" => "redi", "value" => "1"),
            );

            echo (form($imputs));
            ?>



            <tr>            

                <td><?php echo $code; ?></td>
                <td><?php echo $name; ?></td>

                <td class="text-right"><?php echo moneda($price); ?></td>

                <td><?php echo $tax; ?>%</td>

                <td><input type="text"  class="form-control" name="quantity" value="" placeholder="<?php _t("Quantity"); ?>"></td>

                <td>
                    <div class="row">
                        <div class="col-xs-12">
                            <input 
                                type="number" 
                                name="discounts"  
                                class="form-control" 
                                value="<?php echo $discount; ?>"

                                >
                        </div>
                    </div>
                </td>

                <td>
                    <div class="row">
                        <div class="col-xs-12">
                            <select class="form-control" name="discounts_mode">
                                <?php foreach (discounts_mode_list() as $key => $value) { ?>
                                    <option value="<?php echo $value['discount']; ?>">
                                        <?php echo $value['discount']; ?>
                                    </option>
                                <?php } ?>                                           
                            </select>
                        </div>
                    </div>
                </td>

                <td>
                    <input type="submit" class="btn btn-sm btn-primary" value="<?php _t("Add"); ?>">
                </td>
            </tr>
            </form>




        <?php } ?>





    </tbody>
</table>

<?php echo "<p>" . _tr("Discount for this customer on each order") . ": $discount %" . "</p>"; ?>

