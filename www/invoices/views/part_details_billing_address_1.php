


<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Billing address"); ?>: 

            <a href="index.php?c=addresses&a=details&id=<?php echo "$addresses_billing[id]" ?>">
                <?php echo (isset($addresses_billing['id'])) ? $addresses_billing['id'] : ""; ?>
            </a>




        </h3>
    </div>
    <?php if (isset($addresses_billing)) { ?>
        <div class="panel-body">
            <ul class="list-group">                            


                <li class="list-group-item">
                    <a href="index.php?c=contacts&a=details&id=<?php echo $addresses_billing['contact_id']; ?>">
                        <b>
                            <?php echo contacts_formated($addresses_billing['contact_id']) ?>
                        </b>                

                    </a>
                    <?php
                    if ($a == "edit") {
                        include "modal_update_details_billing_address.php";
                    }
                    ?>



                </li>
                <li class="list-group-item"><?php echo "$addresses_billing[number], $addresses_billing[address] " ?></li>
                <li class="list-group-item"><?php echo "$addresses_billing[postcode] - $addresses_billing[barrio] " ?></li>
                <li class="list-group-item"><?php echo "$addresses_billing[city] $addresses_billing[country] " ?></li>                                                        
            </ul>
        </div>
    <?php } else { ?>
        <div class="panel-body">
            <?php message("info", "This contact does not have a billing address") ?>

            <?php
            if ($a == "edit") {
                include "modal_update_details_billing_address.php";
            }
            ?>

        </div>

    <?php } ?>


</div>

