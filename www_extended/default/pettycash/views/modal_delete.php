
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal_delete_<?php echo $pcash->getId(); ?>">
    <?php echo icon('trash'); ?>
    <?php // _t("Delete");  ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_delete_<?php echo $pcash->getId(); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_delete_<?php echo $pcash->getId(); ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_delete_<?php echo $pcash->getId(); ?>Label">
                    <?php _t("Delete"); ?>
                    <?php echo $pcash->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Are you sure?"); ?></h3>
                <?php
                // include "form_delete.php"; 
                ?>
            </div>
            <div class="modal-footer">                                
                <a href="index.php?c=pettycash&a=ok_delete&id=<?php echo $pcash->getId(); ?>&redi[redi]=1" class="btn btn-danger"><?php echo icon('trash'); ?> <?php _t("Delete"); ?></a>                                                
            </div>
        </div>
    </div>
</div>