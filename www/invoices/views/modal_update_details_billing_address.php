
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalBilling">
    <span class="glyphicon glyphicon-edit"></span> <?php _t("Change billing address"); ?>
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

                <p><?php _t("Plase choose an address"); ?></p>

                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#list" aria-controls="list" role="tab" data-toggle="tab"><?php _t("List"); ?></a></li>
                        <?php /* <li role="presentation"><a href="#new" aria-controls="new" role="tab" data-toggle="tab"><?php _t("New"); ?></a></li> */ ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="list">

                            <?php include "form_update_details_billing_address.php"; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="new">
                            <p>-</p>
                            <?php //include "form_new_details_billing_address.php"; ?>
                        </div>


                    </div>

                </div>




            </div>





        </div>
    </div>
</div>