
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_form_login_update">
    <span class="glyphicon glyphicon-briefcase"></span>
    <?php _t("Change rol"); ?>
</button>

<div class="modal fade" id="myModal_form_login_update" tabindex="-1" role="dialog" aria-labelledby="myModal_form_login_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_form_login_updateLabel"><?php _t("Update"); ?></h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_login_update.php";
                ?>
            </div>


        </div>
    </div>
</div>


