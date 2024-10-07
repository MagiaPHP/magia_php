<button 
    type="button" 
    class ="btn btn-primary btn-sm" 
    data-toggle="modal" 
    data-target="#adresses_block_<?php echo "$addresses_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-lock"></span>
    <?php echo _t("Block"); ?>
</button>

<div class="modal fade" id="adresses_block_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="adresses_block_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="adresses_block_<?php echo "$addresses_list_by_contact_id[name]"; ?>Label">
                    <?php _t("Block addresses"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Are you sure?"); ?></h2>

                <p>
                    <?php _t("When blocking an address, it cannot be used in orders, invoices, credit notes or any other document"); ?>
                </p>

                <p>
                    <?php _t("There will be no changes to documents created before the lock"); ?>
                </p>


                <?php include "form_adresses_block.php"; ?>
            </div>
        </div>
    </div>
</div>