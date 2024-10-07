<button 
    type="button" 
    class ="btn btn-primary btn-sm" 
    data-toggle="modal" 
    data-target="#modalAddresses_list_by_contact_id_<?php echo "$addresses_list_by_contact_id[id]"; ?>"
    >
    <span class="glyphicon glyphicon-edit"></span>
    <?php echo _t("Edit"); ?>
</button>

<div class="modal fade" id="modalAddresses_list_by_contact_id_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="modalAddresses_list_by_contact_id_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalAddresses_list_by_contact_id_<?php echo "$addresses_list_by_contact_id[name]"; ?>Label">
                    <?php _t("Edit info"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php //echo "$addresses_list_by_contact_id[id]" ; ?>

                <?php include "form_adresses_edit.php"; ?>
            </div>
        </div>
    </div>
</div>