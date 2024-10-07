<button type="button" class="btn btn-<?php echo ($expense->getMy_ref()) ? "default" : "primary"; ?> btn-xs" data-toggle="modal" data-target="#myModalmy_ref_update">
    <?php icon('pencil'); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="myModalmy_ref_update" tabindex="-1" role="dialog" aria-labelledby="myModalmy_ref_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalmy_ref_updateLabel">
                    <?php _t("Update my reference"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php
                include "form_my_ref_update.php";
                ?>


            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
