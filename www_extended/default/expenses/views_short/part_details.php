<?php
//vardump($expense);
?>



<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Sender") ?> 
                <?php echo $expense->getProvider_id(); ?>

            </div>
            <div class="panel-body">

                <h3><?php echo contacts_formated($expense->getProvider_id()); ?></h3>
                <p>
                    Av de la comomotion<br>
                    1050 - Bruxelles<br>
                    TVA: <?php echo contacts_field_id('tva', $expense->getProvider_id()) ?>
                </p>




            </div>
        </div>

    </div>


    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Reciver"); ?>
            </div>
            <div class="panel-body">
                <h3>Reciver 123</h3>
                <p>
                    Av de la comomotion<br>
                    1050 - Bruxelles<br>
                    TVA: 0123456789
                </p>
            </div>
        </div>

    </div>




    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">Panel heading without title</div>
            <div class="panel-body">
                Panel content
            </div>
        </div>
    </div>
</div>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Invoice number"); ?>
            </div>
            <div class="panel-body">
                <?php echo $expense->getInvoice_number(); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Date"); ?>
            </div>
            <div class="panel-body">
                <?php echo $expense->getDate(); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("From budget"); ?>
            </div>
            <div class="panel-body">
                <?php echo $expense->getBudget_id(); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Due date"); ?>
            </div>
            <div class="panel-body">
                <?php echo $expense->getDeadline(); ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php _t("Code client"); ?>
            </div>
            <div class="panel-body">
                xxx
            </div>
        </div>
    </div>

</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Title"); ?>
        </h3>
    </div>
    <div class="panel-body">
        <?php echo $expense->getTitle(); ?>
    </div>
</div>





<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Items"); ?>
    </div>
    <div class="panel-body">

        <table class="table">
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


    </div>
</div>

