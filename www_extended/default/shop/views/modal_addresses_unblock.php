
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addresses_unblock_<?php echo $address['id']; ?>">
    <span class="glyphicon glyphicon-ok"></span>
    <?php _t("Unblock"); ?>
</button>


<div class="modal fade" id="addresses_unblock_<?php echo $address['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addresses_unblock_<?php echo $address['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_unblock_<?php echo $address['id']; ?>Label">
                    <?php _t("Delete"); ?> <?php echo $address['id']; ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Show address"); ?></h3>

                <p>
                    <?php _t("Show in the list of addresses available for package delivery"); ?>
                </p>


                <?php
                include "form_address_unblock.php";
                ?>        
            </div>        
        </div>
    </div>
</div>

