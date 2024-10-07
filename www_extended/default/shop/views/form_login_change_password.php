
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_form_login_change_password">
    <?php _t("Update login"); ?>
</button>

<div class="modal fade" id="myModal_form_login_change_password" tabindex="-1" role="dialog" aria-labelledby="myModal_form_login_change_passwordLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_form_login_change_passwordLabel"><?php _t("Update"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_login_change_password.php";
                ?>
            </div>


        </div>
    </div>
</div>


