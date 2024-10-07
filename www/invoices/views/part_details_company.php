
<?php
if ($a == "edit") {
    include "modal_contacts_update.php";
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'part_details_company', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _t("Client"); ?>: <?php echo $invoices['client_id']; ?>
        </h3>
    </div>
    <?php if (isset($invoices['client_id'])) { ?>

        <div class="panel-body">
            <ul class="list-group">                            
                
                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $invoices['client_id']; ?>">
                        <b>
                            <?php echo contacts_formated($invoices['client_id']) ?>
                        </b>                
                    </a>                    
                </li>

                <li class="list-group-item">
                    <b><?php _t("Tva"); ?>: </b>   
                    <?php echo contacts_field_id("tva", $invoices['client_id']); ?>
                </li>


                <li class="list-group-item">
                    <b><?php _t("Discounts"); ?>: </b>   
                    <?php
                    if (contacts_field_id("discounts", $invoices['client_id'])) {
                        echo contacts_field_id("discounts", $invoices['client_id']) . "%";
                    }
                    ?>
                </li>
            </ul>
            
            
        </div>
    <?php } else { ?>
        <div class="panel-body">
            <?php message("info", "This budget has no recipient, add one") ?>

            <?php
            if ($a == "edit") {
                // include "modal_update_details_billing_address.php" ;
            }
            ?>

        </div>

    <?php } ?>


</div>

