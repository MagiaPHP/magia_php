<button type="button" class="btn btn-<?php echo ($expense->getCategory_code()) ? "default" : "primary"; ?> btn-xs" data-toggle="modal" data-target="#myModalcategory_code_update">
    <?php icon('pencil'); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="myModalcategory_code_update" tabindex="-1" role="dialog" aria-labelledby="myModalcategory_code_updateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalcategory_code_updateLabel">
                    <?php _t("Update category code"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php
                include "form_category_code_update.php";
                ?>


            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
