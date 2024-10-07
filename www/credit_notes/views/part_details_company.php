<?php
if ($a == "edit") {

    include "modal_change_client.php";
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
            <?php _t("Company"); ?>: <?php echo $cn->getClient_id(); ?>
        </h3>
    </div>

    <?php if (($cn->getClient_id())) { ?>

        <div class="panel-body">

            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $cn->getClient_id(); ?>">
                        <b>
                            <?php echo contacts_formated($cn->getClient_id()) ?>
                        </b>                
                    </a>                    
                </li>


                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $cn->getClient_id()); ?>
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

