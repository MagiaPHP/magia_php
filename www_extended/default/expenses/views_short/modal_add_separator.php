<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_separator">
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

                <h2>
                    <?php _t('Separator'); ?>
                </h2>

                <p>
                    <?php _t('Add a line without a price, generally used to separate different groups of items'); ?>
                </p>

                <?php
                include "form_add_separator.php";
                ?>


            </div>


        </div>
    </div>
</div>