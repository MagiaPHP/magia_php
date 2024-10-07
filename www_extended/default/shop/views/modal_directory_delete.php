<button 
    type="button" 
    class="btn btn-danger btn-sm" 
    data-toggle="modal" 
    data-target="#directory_delete_<?php echo "$directory_list_by_contact_id[id]"; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Delete"); ?>
</button>


<div 
    class="modal fade" 
    id="directory_delete_<?php echo "$directory_list_by_contact_id[id]"; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="directory_delete_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
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
                <h4 class="modal-title" id="directory_delete_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                    <?php _t("Delete info"); ?> : <?php echo "$directory_list_by_contact_id[id]"; ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Are you sure?"); ?></h3>
                <?php include "form_contacts_directory_delete.php"; ?>
            </div>                                                                               
        </div>
    </div>
</div>