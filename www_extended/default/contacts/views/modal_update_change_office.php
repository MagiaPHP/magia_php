
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#update_change_office">
    <?php _t("Change office"); ?>
</button>


<div class="modal fade" id="update_change_office" tabindex="-1" role="dialog" aria-labelledby="update_change_officeLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="update_change_officeLabel">
                    <?php _t("Change office"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php include "form_update_change_office.php"; ?>

            </div>






        </div>
    </div>
</div>