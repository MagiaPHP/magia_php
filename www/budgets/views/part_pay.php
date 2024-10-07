<?php
#################################################################
## METODOS DE PAGO ###############################################################
## METODOS DE PAGO ###############################################################
## METODOS DE PAGO ###############################################################
## METODOS DE PAGO ###############################################################
#################################################################
#################################################################
?>




<div class="well">

    <h3><?php _t("Bank deposit"); ?></h3>
    <p><?php _t('Please make your payment with the following information'); ?></p>
    <p><?php _t('Do not forget the payment communication, without this information it will be difficult to validate your payment'); ?></p>

    <br>
    <p><b><?php _t("Beneficiary"); ?>:</b> <br>
        Robinson Coello </p>
    <p>
        <b><?php _t("Bank name"); ?>: </b><br>
        ING
    </p>
    <p><b><?php _t("Account number"); ?>:</b> <br>
        BE15 3632 3510 7630</p>
    <p><b><?php _t("IBAN"); ?>:</b> <br>
        BE15 3632 3510 7630
    </p>

    <p>
        <b><?php _t("Comunication"); ?>: </b> <br>
        <?php echo $budget->getCe(); ?> 
    </p>
    <p>
        <b><?php _t("Total to pay"); ?>:</b> <br>
        <?php echo monedaf($budget->getTotal_to_pay()); ?>
    </p>

</div>
