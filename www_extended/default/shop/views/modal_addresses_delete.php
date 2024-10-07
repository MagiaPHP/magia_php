
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addresses_delete_<?php echo $address['id']; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="addresses_delete_<?php echo $address['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addresses_delete_<?php echo $address['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_delete_<?php echo $address['id']; ?>Label">
                    <?php _t("Delete"); ?> <?php echo $address['id']; ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Delete address"); ?></h3>
                <p>
                    <?php _t("Documents previously created with this address will not be modified"); ?>
                </p>
                <?php
                include "form_address_delete.php";
                ?>        
            </div>        
        </div>
    </div>
</div>

