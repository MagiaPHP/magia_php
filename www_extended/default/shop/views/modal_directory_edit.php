
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#directory_edit_<?php echo "$directory_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-pencil"></span>
    <?php _t("Edit"); ?>
</button>

<!-- Modal -->
<div 
    class="modal fade" 
    id="directory_edit_<?php echo "$directory_list_by_contact_id[id]"; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="directory_edit_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="directory_edit_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                    <?php _t("Edit data info"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php //echo "$directory_list_by_contact_id[id]";  ?>
                <?php include "form_contacts_directory_edit.php"; ?>
            </div>                                                                               
        </div>
    </div>
</div>