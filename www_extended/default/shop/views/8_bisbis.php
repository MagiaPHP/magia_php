<?php include view("home", "header"); ?>
<div class="container">



    <div class="row">
        <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
            <?php //include "izq_registre.php"; ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

            <?php
            // Gestion de mensajes cortos
            sms($sms);

            if ($error) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>
            <?php ######################################################## ?>

            <h1>bon de comande # (000215454)</h1>

            <table class="table table-striped" border>
                <tr>
                    <td>Bon de comande</td>
                    <td class="text-right">
                        <?php echo $budget->getClient()->getName(); ?><br>
                        robinson coello<br>
                        <?php //echo vardump($budget->getAddresses_billing()); ?><br>
                        1081 - koekelberg<br>
                        <?php _t('Tva number'); ?>: <?php echo $budget->getClient()->getTva(); ?>
                    </td>
                </tr>
                <tr>
                    <td><?php _t("Date"); ?>: <?php echo $budget->getDate(); ?></td>
                </tr>
            </table>

            <table class="table table-striped" border>
                <thead>
                    <tr>
                        <th><?php _t("Quantity"); ?></th>
                        <th><?php _t("Code"); ?></th>
                        <th><?php _t("Description"); ?></th>
                        <th class="text-right"><?php _t("Price"); ?></th>
                        <th class="text-right"><?php _t("Discounts"); ?></th>
                        <th class="text-right"><?php _t("Total htva"); ?></th>
                        <th class="text-right"><?php _t("Tax"); ?></th>
                        <th class="text-right"><?php _t("Total tvac"); ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (budget_lines_list_by_budget_id($budget->getId()) as $key => $line) {
                        echo '<tr>';
                        echo '<td>' . $line["quantity"] . '</td>';
                        echo '<td>' . $line["code"] . '</td>';
                        echo '<td>' . $line["description"] . '</td>';
                        echo '<td class="text-right">' . moneda($line["price"]) . '</td>';
                        echo '<td class="text-right">' . moneda($line["discounts"]) . ' ' . $line["discounts_mode"] . '</td>';
                        echo '<td class="text-right">' . moneda($line["tax"]) . '</td>';
                        echo '<td class="text-right">' . moneda($line["price"]) . '</td>';
                        echo '<td class="text-right">' . moneda($line["price"]) . '</td>';
                        echo '</tr>';
                    }
                    ?>

                    <tr>
                        <td>1</td>
                        <td>MVIP</td>
                        <td>Membresia vip 365 days</td>
                        <td class="text-right"><?php echo moneda(9.99); ?></td>
                        <td class="text-right"><?php echo moneda(0); ?></td>
                        <td class="text-right"><?php echo moneda(9, 99); ?></td>
                        <td class="text-right"><?php echo moneda(1, 21); ?></td>
                        <td class="text-right"><?php echo moneda(10, 21); ?></td>
                    </tr>
                </tbody>
            </table>



            <h3><?php _t("Payment methods at your disposal"); ?></h3>




            <div class="row">



                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>Carta de credito</h3>
                            <p>Use su carta de credito prefereida</p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>PayPal</h3>
                            <p>Use su carta de credito prefereida</p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>Deposito Bancario</h3>
                            <p>Use su carta de credito prefereida</p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-md-3 col-lg-3">
                    <div class="thumbnail">
                        <img src="..." alt="...">
                        <div class="caption">
                            <h3>Transferencia</h3>
                            <p>Use su carta de credito prefereida</p>
                            <p>
                                <a href="#" class="btn btn-primary" role="button">Button</a> 
                                <a href="#" class="btn btn-default" role="button">Button</a>
                            </p>
                        </div>
                    </div>
                </div>



            </div>



            <div class="well">

                <h3><?php _t("Bank deposit"); ?></h3>
                <p><?php _t('Please make your payment with the following information, do not forget the payment communication, without this information it will be difficult to validate your payment'); ?></p>
                <p><b><?php _t("Beneficiary"); ?>:</b> Robinson Coello </p>
                <p><b><?php _t("Bank name"); ?>:</b>: ING</p>
                <p><b><?php _t("Account number"); ?>:</b> BE15 3632 3510 7630</p>
                <p><b><?php _t("IBAN"); ?>:</b> BE15 3632 3510 7630</p>
                <p><b><?php _t("BIC"); ?>:</b> BE15 3632 3510 7630</p>
                <p><b><?php _t("Comunication"); ?>:</b> <?php echo $company->getTva(); ?></p>
                <p><b><?php _t("Total to pay"); ?>:</b> <?php echo $company->getTva(); ?></p>



            </div>

            <?php
            //   vardump($budget->getClient());
            vardump($budget);
            ?>







            <?php ######################################################## ?>

            <?php include "00_footer.php"; ?>






