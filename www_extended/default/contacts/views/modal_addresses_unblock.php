<button 
    type="button" 
    class ="btn btn-default btn-sm" 
    data-toggle="modal" 
    data-target="#adresses_unlock_<?php echo "$addresses_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-ok"></span>
    <?php echo _t("Unblock"); ?>
</button>

<div class="modal fade" id="adresses_unlock_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="adresses_unlock_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="adresses_unlock_<?php echo "$addresses_list_by_contact_id[name]"; ?>Label">
                    <?php _t("Unblock addresses"); ?> <?php echo "$addresses_list_by_contact_id[id]"; ?> 
                </h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Are you sure?"); ?></h2>

                <p>
                    <?php _t("Make this address available to use in documents like  orders, delivery notes, invoices, etc."); ?>
                </p>






                <?php include "form_adresses_unblock.php"; ?>
            </div>
        </div>
    </div>
</div>