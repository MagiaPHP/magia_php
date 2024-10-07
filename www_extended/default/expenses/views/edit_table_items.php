
<table class="table table-striped" border>
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo _t("Code"); ?></th>
            <th><?php echo _t("Description"); ?></th>
            <th><?php echo _t("Qty"); ?></th>
            <th class="text-right"><?php echo _t("Price"); ?></th>
            <th class="text-right"><?php echo _t("SubTotal"); ?></th>
            <th class="text-right"><?php echo _t("Discounts"); ?></th>
            <th class="text-right"><?php echo _t("Htax"); ?></th>
            <th class="text-right"><?php echo _t("Tax"); ?></th>
            <th class="text-right"><?php echo _t("Tvac"); ?></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $i = 1;
        foreach ($expense->getLines() as $key => $line) {
            echo '<tr>
                <td>' . $i . '</td>
                <td>' . $line["code"] . '</td>
                <td>' . $line["description"] . '</td>
                <td>' . $line["quantity"] . '</td>
                <td class="text-right">' . moneda($line["price"]) . '</td>
                <td class="text-right">' . moneda($line["price"] * $line["quantity"]) . '</td>
                <td class="text-right">' . moneda($line["discounts"]) . '</td>
                <td class="text-right">' . moneda($line["discounts_mode"]) . '</td>
                <td class="text-right">' . moneda($line["tax"]) . '</td>
                <td class="text-right">' . moneda($line["tax"]) . '</td>
            </tr>';
            $i++;
        }
        ?>
    </tbody>


    <tbody>

        <tr>
            <td></td>

            <td>
                <input type="text" class="form-control" name="code" id="code" placeholder="<?php _t("Code"); ?>" value="">
            </td>

            <td>
                <input type="text" class="form-control" name="description" id="description" placeholder="<?php _t("Description"); ?>">
            </td>

            <td>
                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="<?php _t("quantity"); ?>">
            </td>


            <td>
                <input type="text" class="form-control" name="price" id="price" placeholder="<?php _t("price"); ?>">
            </td>

            <td>
                <input type="text" class="form-control" name="discounts" id="discounts" placeholder="<?php _t("discounts"); ?>">
            </td>

            <td>
                <input type="text" class="form-control" name="discounts_mode" id="discounts_mode" placeholder="<?php _t("discounts_mode"); ?>">
            </td>

            <td></td>

            <td>
                <input type="text" class="form-control" name="tax" id="tax" placeholder="<?php _t("Tva"); ?>">
            </td>

            <td>
                <input type="text" class="form-control" name="tax" id="tax" placeholder="<?php _t("Tva"); ?>">
            </td>
        </tr>

    </tbody>



















    <tr>
        <td></td>
        <td colspan="8" class="text-right"><b><?php _t('Subtotal'); ?></b></td>
        <td class="text-right"><?php echo moneda(150) ?></td>
        <td></td>
    </tr>

    <?php foreach (array(0, 6, 12, 21) as $vat) { ?>
        <tr>
            <td colspan="8" class="text-right"><?php echo $vat; ?>%</td>
            <td class="text-right"><?php echo moneda(150) ?></td>
            <td></td>
            <td></td>
        </tr>
    <?php }
    ?>

    <tr>
        <td></td>
        <td colspan="8" class="text-right"><b><?php _t('Total tax'); ?></b></td>
        <td class="text-right"><?php echo moneda(100) ?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="8" class="text-right"><b><?php _t('Total'); ?></b></td>
        <td class="text-right"><?php echo moneda(250) ?></td>
        <td></td>
    </tr>


</table>