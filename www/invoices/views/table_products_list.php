<table class="table tab-content">
    <thead>
        <tr>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Description"); ?></th>
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

        $discount = (clients_search_discount_by_client($invoices['client_id'])) ? clients_search_discount_by_client($invoices['client_id']) : 0;

        foreach (products_list() as $key => $product) {



            //vardump($invoices['client_id']); 
            ?>


        <form method="post" action="index.php">    

            <input type="hidden" name="c" value="invoices">
            <input type="hidden" name="a" value="ok_linesAddIndividualByCode">
            <input type="hidden" name="code" value="<?php echo $product['code']; ?>">  
            <input type="hidden" name="invoice_id" value="<?php echo $id; ?>">  
            <tr>            
                <td><?php echo $product['code']; ?></td>
                <td><?php echo $product['name']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td class="text-right"><?php echo moneda($product['price']); ?></td>
                <td><?php echo $product['tax']; ?>%</td>
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

