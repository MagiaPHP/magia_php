<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Delivery address"); ?>: 

            <a href="index.php?c=addresses&a=details&id=<?php echo "$addresses_delivery[id]" ?>">
                <?php echo (isset($addresses_delivery['id'])) ? $addresses_delivery['id'] : ""; ?>
            </a>
        </h3>

    </div>

    <?php if (isset($addresses_delivery)) { ?>
        <div class="panel-body">
            <ul class="list-group">                                            
                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $addresses_delivery['contact_id']; ?>">
                        <b>
                            <?php echo contacts_formated($addresses_delivery['contact_id']) ?>
                        </b> 

                    </a> 

                    <?php
                    if ($a == "edit") {
                        include "modal_update_details_delivery_address.php";
                    }
                    ?>
                </li>
                <li class="list-group-item"><?php echo "$addresses_delivery[number], $addresses_delivery[address] " ?></li>
                <li class="list-group-item"><?php echo "$addresses_delivery[postcode] - $addresses_delivery[barrio] " ?></li>
                <li class="list-group-item"><?php echo "$addresses_delivery[city] $addresses_delivery[country] " ?></li>                                                        
            </ul>
        </div>
    <?php } else { ?>
        <div class="panel-body">
            <?php message("info", "This credit_note does not have a billing address") ?>

            <?php
            if ($a == "edit") {
                include "modal_update_details_delivery_address.php";
            }
            ?>


        </div>

    <?php } ?>





</div>

