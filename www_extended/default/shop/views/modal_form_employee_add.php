
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_form_login_add">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add like employee"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_form_login_add" tabindex="-1" role="dialog" aria-labelledby="myModal_form_login_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_form_login_addLabel"><?php _t("Add like employee"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_employee_add.php"; ?>
            </div>
        </div>
    </div>
</div>

