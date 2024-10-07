<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#contacts_delete_<?php echo $employees_list_by_company['id']; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="contacts_delete_<?php echo $employees_list_by_company['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="contacts_delete_Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_delete_Label">
                    <?php echo contacts_formated($employees_list_by_company['contact_id']); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Are you sure?"); ?></h3>

                <?php include "form_employe_delete.php"; ?>
            </div>


        </div>
    </div>
</div>