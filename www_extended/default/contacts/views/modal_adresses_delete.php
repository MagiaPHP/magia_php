<button 
    type="button" 
    class ="btn btn-danger btn-sm" 
    data-toggle="modal" 
    data-target="#adresses_delete_<?php echo "$addresses_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php echo _t("Delete"); ?>
</button>

<div class="modal fade" id="adresses_delete_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="adresses_delete_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="adresses_delete_<?php echo "$addresses_list_by_contact_id[name]"; ?>Label">
                    <?php _t("Delete addresses"); ?> <?php echo "$addresses_list_by_contact_id[id]"; ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php if ($addresses_list_by_contact_id['status'] == 0) { ?>
                    <h2><?php _t("Unblock this address"); ?></h2>

                    <h3>
                        <?php _t("If you want to use this address, unblock it"); ?>
                    </h3>

                    <?php include "form_adresses_unblock.php"; ?>


                <?php } else { ?>
                    <h2><?php _t("Block this address"); ?></h2>

                    <h3>
                        <?php _t("If you don't want to use this address, block it but don't delete it"); ?>
                    </h3>

                    <?php include "form_adresses_block.php"; ?>

                <?php } ?>

                <hr>




                <h2><?php _t("Delete this address"); ?></h2>

                <ul>
                    <li><?php _t("It will also delete the modes of transport that are related to this address"); ?></li>
                    <li><?php _t("Documents that have this address will not be affected if you delete this address"); ?></li>
                </ul>

                <?php include "form_adresses_delete.php"; ?>
            </div>
        </div>
    </div>
</div>