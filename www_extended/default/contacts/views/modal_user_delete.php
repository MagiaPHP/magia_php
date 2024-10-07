
<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ok_block_delete_<?php echo $id; ?>">
    <span class="glyphicon glyphicon-trash"></span>
    <?php echo _tr("Delete"); ?>
</button>


<div class="modal fade" id="ok_block_delete_<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="ok_block_deleteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_block_deleteLabel">
                    <?php echo _tr("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Are you sure?"); ?></h3>

                <p>
                    <?php echo _t("This will erase the login and password of this contact, but the contact remains in the system"); ?>,

                    <?php echo _t("If you only want to block, use the block option"); ?>
                </p>





                <?php
                include "form_user_delete.php";
                ?>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php _t("Close"); ?>
                </button>

            </div>
        </div>
    </div>
</div>




