<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#rol_update<?php echo $ubo['contact_id']; ?>">
    <?php _menu_icon('top', 'rols'); ?>
    <?php // echo _tr("Password"); ?>
</button>


<div class="modal fade" id="rol_update<?php echo $ubo['contact_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="update_passwordLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="update_passwordLabel">
                    <?php echo _tr("Change role"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_user_rol_update.php";
                ?>
            </div>

        </div>
    </div>
</div>