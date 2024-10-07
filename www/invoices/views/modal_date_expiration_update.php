<?php
/**
 * 
  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dateExpiration">
  <span class="glyphicon glyphicon-edit"></span>
  <?php _t('Change'); ?>
  </button>

 */
?>
<div class="modal fade" id="dateExpiration" tabindex="-1" role="dialog" aria-labelledby="dateExpirationLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="dateExpirationLabel">
                    <?php _t("Update"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Update expiration date"); ?></h3>



                <?php include "form_date_expiration_update.php"; ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <?php _t("Close"); ?>
                </button>
            </div>
        </div>
    </div>
</div>