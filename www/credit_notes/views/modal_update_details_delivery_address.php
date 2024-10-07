<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalDelivery">
    <?php _t("Change"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModalDelivery" tabindex="-1" role="dialog" aria-labelledby="myModalDeliveryLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalDeliveryLabel">
                    <?php _t('Change delivery address'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p><?php _t("Plase choose an address"); ?></p>

                <?php
                //$headoffice_id = offices_headoffice_of_office($credit_notes['client_id']); 
                $headoffice_id = offices_headoffice_of_office($cn->getClient_id());

                if (addresses_delivery_list_by_contact_id($headoffice_id)) {
                    include "form_update_details_delivery_address.php";
                } else {
                    message('info', 'This company does not have any shipping address, you must add one first');
                }
                ?>

            </div>





        </div>
    </div>
</div>