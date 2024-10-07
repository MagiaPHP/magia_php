
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addresses_edit_<?php echo $address['id']; ?>">
    <span class="glyphicon glyphicon-pencil"></span>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="addresses_edit_<?php echo $address['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="addresses_edit_<?php echo $address['id']; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="addresses_edit_<?php echo $address['id']; ?>Label"><?php _t("Edit"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "formAddressUpdate.php";
                ?>        
            </div>        
        </div>
    </div>
</div>

