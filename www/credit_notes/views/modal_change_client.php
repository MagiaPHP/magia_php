
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mychange_client">
    <?php _t("Change"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="mychange_client" tabindex="-1" role="dialog" aria-labelledby="mychange_clientLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="mychange_clientLabel">
                    <?php _t('Change client'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("Please choose an new client"); ?></p>



                <?php
                include "form_change_client.php";
                ?>


            </div>





        </div>
    </div>
</div>