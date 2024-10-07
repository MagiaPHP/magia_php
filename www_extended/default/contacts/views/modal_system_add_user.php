
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_user_to_system_ok">
    <?php echo _tr("Change password"); ?>
</button>


<div class="modal fade" id="add_user_to_system_ok" tabindex="-1" role="dialog" aria-labelledby="add_user_to_system_okLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_user_to_system_okLabel">
                    <?php echo _tr("Change password"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_update_password.php";
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>