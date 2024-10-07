<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add_separator">
    <?php echo icon("minus"); ?>
    <?php _t("Add separator"); ?>
</button>

<div class="modal fade" id="add_separator" tabindex="-1" role="dialog" aria-labelledby="add_separatorLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_separatorLabel">
                    <?php _t("Add separator"); ?>
                </h4>
            </div>

            <div class="modal-body">

                <?php
                include "2_cols_form_add_separator.php";
                ?>


            </div>


        </div>
    </div>
</div>