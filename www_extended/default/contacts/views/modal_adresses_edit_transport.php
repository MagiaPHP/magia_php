<a 
    data-toggle="modal" 
    data-target="#modal_adresses_edit_transport_<?php echo "$addresses_list_by_contact_id[id]"; ?>"
    href="#"
    >
    <span class="glyphicon glyphicon-pencil"></span>
</a>


<span class=""></span>

<div class="modal fade" id="modal_adresses_edit_transport_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="modal_adresses_edit_transport_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_adresses_edit_transport_<?php echo "$addresses_list_by_contact_id[name]"; ?>Label">
                    <?php _t("Edit info"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_adresses_edit_transport.php"; ?>
            </div>
        </div>
    </div>
</div>