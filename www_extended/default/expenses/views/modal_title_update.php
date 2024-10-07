
<button type="button" class="btn btn-<?php echo ($expense->getTitle()) ? "default" : "primary"; ?> btn-xs" data-toggle="modal" data-target="#title_update">
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="title_update" tabindex="-1" role="dialog" aria-labelledby="title_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="title_updateLabel">
                    <?php _t('Title update'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php include "form_title_update.php"; ?>

            </div>



        </div>
    </div>
</div>