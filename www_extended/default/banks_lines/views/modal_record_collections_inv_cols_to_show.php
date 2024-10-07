<a href="#"
   data-toggle="modal" data-target="#form_record_collections_inv_cols_to_show"
   >
       <?php echo icon("wrench"); ?>
</a>

<div class="modal fade" id="form_record_collections_inv_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="form_record_collections_inv_cols_to_showLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="form_record_collections_inv_cols_to_showLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php include "form_record_collections_inv_cols_to_show.php"; ?>

            </div>


        </div>
    </div>
</div>

