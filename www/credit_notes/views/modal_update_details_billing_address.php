
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalBilling">
    <?php _t("Change"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModalBilling" tabindex="-1" role="dialog" aria-labelledby="myModalBillingLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalBillingLabel">
                    <?php _t('Change billing address'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("Please choose an address"); ?></p>

                <?php
                include "form_update_details_billing_address.php";
                ?>
            </div>
        </div>
    </div>
</div>