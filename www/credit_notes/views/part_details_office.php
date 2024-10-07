<?php
if ($a == "edit") {
    // Verificar si es multi-VAT o no, e incluir el archivo correspondiente
    if (IS_MULTI_VAT) {
        include "modal_change_office.php";
    } else {
        include "modal_change_client.php";
    }
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'part_details_company');
            }
            ?>
            <?php _t("Office"); ?>
        </h3>
    </div>

    <?php if (($cn->getOffice_id())) { ?>

        <div class="panel-body">

            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getOffice_id(); ?>">
                        <b>
                            <?php echo contacts_formated($cn->getOffice_id()) ?>
                        </b>                
                    </a>                    
                </li>


                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $cn->getOffice_id()); ?>
                </li>

            </ul>
        </div>

    <?php } else { ?>

        <div class="panel-body">
            <?php message("info", "This credit_note has no recipient, add one") ?>

            <?php
            if ($a == "edit") {
                // include "modal_update_details_billing_address.php" ;
            }
            ?>

        </div>

    <?php } ?>


</div>

