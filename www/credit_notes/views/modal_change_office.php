
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mychange_office">
    <?php _t("Change office"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="mychange_office" tabindex="-1" role="dialog" aria-labelledby="mychange_officeLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mychange_officeLabel">
                    <?php _t('Change office'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("Please choose"); ?></p>



                <?php
                include "form_change_office.php";
                ?>


            </div>





        </div>
    </div>
</div>