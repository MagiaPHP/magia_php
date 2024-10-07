<button 
<?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>
    type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contacts_bank_edit_<?php echo "$banks_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-edit"></span>

</button>


<div class="modal fade" id="contacts_bank_edit_<?php echo "$banks_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="contacts_bank_edit_<?php echo "$banks_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_bank_edit_<?php echo "$banks_list_by_contact_id[id]"; ?>Label">
                    <?php _t("Edit bank info"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                if (permissions_has_permission($u_rol, "banks", "update")) {

                    include "form_contacts_bank_edit.php";
                }
                ?>
            </div>                                                                               
        </div>
    </div>
</div>


