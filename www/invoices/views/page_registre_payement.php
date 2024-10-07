
<h3 class="text-center"><?php _t("Invoice"); ?> : <?php //echo invoices_numberf($id);         ?> <?php echo invoices_numberf_to_print($id, 1); ?></h3>


<table class="table table-bordered">
    <tr>
        <td><b><?php _t("Client"); ?></b></td>
        <td><b><?php _t("Date"); ?></b></td>
        <td><b><?php _t("Date expiration"); ?></b></td>
        <td><b><?php _t("ce"); ?></b></td>
    </tr>
    <tr>
        <td><?php echo contacts_formated($inv->getClient_id()); ?></b></td>
        <td><?php echo $inv->getDate(); ?></b></td>
        <td><?php echo $inv->getDate_expiration(); ?></b></td>
        <td><?php echo $inv->getCe(); ?></b></td>

    </tr>
    <tr>
        <td><b><?php _t("Total"); ?></b></td>
        <td><b><?php _t("Tax"); ?></b></td>
        <td><b><?php _t("Advance"); ?></b></td>
        <td><b><?php _t("Solde"); ?></b></td>
    </tr>
    <tr>
        <td><?php echo moneda($inv->getTotal()); ?></b></td>
        <td><?php echo moneda($inv->getTax()); ?></b></td>
        <td><?php echo moneda($inv->getAdvance()); ?></b></td>
        <td ><?php echo moneda((( $inv->getTotal() + $inv->getTax() ) - abs($inv->getAdvance()))); ?></b></td>
    </tr>
</table>


