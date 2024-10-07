
<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal_edit_<?php echo $pcash->getId(); ?>">
    <?php echo icon('pencil'); ?>
    <?php //_t("Edit");  ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_edit_<?php echo $pcash->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_edit_<?php echo $pcash->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_edit_<?php echo $pcash->getId(); ?>Label">
                    <?php _t("Edit"); ?>
                    <?php echo $pcash->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "form_edit.php";
                ?>
            </div>


        </div>
    </div>
</div>