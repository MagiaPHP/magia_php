<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>">
    <?php echo icon("edit"); ?>
    <?php // _t("Edit"); ?>
</button>


<div class="modal fade" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                    <?php _t("Edit data info"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php include "form_contacts_directory_edit.php"; ?>
            </div>                                                                               
        </div>
    </div>
</div>