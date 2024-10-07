<?php
/**
 * <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#date_start_update">
  Launch demo modal
  </button>
 */
?>


<div class="modal fade" id="date_start_update" tabindex="-1" role="dialog" aria-labelledby="date_start_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="date_start_updateLabel">
                    <?php _t("Update start date"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_date_start_update.php"; ?>
            </div>
        </div>
    </div>
</div>