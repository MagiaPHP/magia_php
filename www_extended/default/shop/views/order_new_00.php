<ul class="list-group">
    <?php
    /* <li class="list-group-item">
      <span class="glyphicon glyphicon-file"></span>
      <?php // _t("Order number"); ?>: <b><?php echo $order['id']; ?></b>
      </li> */

    //    vardump($_SESSION); 
    ?>

    <li class="list-group-item">
        <a href="index.php?c=shop&a=order_choose_contact"><span class="glyphicon glyphicon-pencil"></span></a>
        <span class="glyphicon glyphicon-user"></span>
        <?php _t("Patient"); ?>: <b><?php echo contacts_formated($order['patient_id']) ?></b>
    </li>


    <?php
////////////////////////////////////////////////////////////////////////////
    if ($order['date_delivery']) {
        ?> 
        <li class="list-group-item">
            <a href="index.php?c=shop&a=order_choose_date"><span class="glyphicon glyphicon-pencil"></span></a>
            <span class="glyphicon glyphicon-calendar"></span>
            <?php _t("Shipping date"); ?>: <b><?php echo $order['date_delivery']; ?>        
            </b>
        </li>

    <?php } else { ?> 
        <li class="list-group-item">
            <a href="index.php?c=shop&a=order_choose_date"><span class="glyphicon glyphicon-pencil"></span></a>
            <span class="glyphicon glyphicon-calendar"></span>
            <?php _t("Manufacturing"); ?>: 
            <b>
                <?php
                echo
                ( $order['delivery_days'] > 1 ) ?
                        $delivery_days . " " . _tr("Working days after reception") :
                        $delivery_days . " " . _tr("Working day after reception")
                ;
                ?>
            </b>
        </li>

    <?php } ?>
</ul>

<a name="order"></a>

<?php
if (
        (isset($material_r_id) && $material_r_id == "1" ) || (isset($material_r_id) && $material_r_id == "9") // THERMOTEC
        ||
        (isset($material_l_id) && $material_l_id == "1") || (isset($material_l_id) && $material_l_id == "9") // THERMOSOFT
) {

    message('info', 'The production of this material (THERMOTEC, THERMOSOFT) can take more than 10 days');
}
?>





