<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#contacts_delete_<?php echo $clac['id']; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Delete"); ?>
</button>


<div class="modal fade" id="contacts_delete_<?php echo $clac['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="contacts_delete_Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_delete_Label">
                    <?php echo contacts_formated($clac['id']); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Are you sure?"); ?></h3>
                6666

                <?php include "form_contacts_delete.php"; ?>
            </div>


        </div>
    </div>
</div>