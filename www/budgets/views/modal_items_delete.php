
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModalDelete_<?php echo $budget_items['id']; ?>">
    <?php echo icon("trash"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModalDelete_<?php echo $budget_items['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalDelete_<?php echo $budget_items['id']; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalDelete_<?php echo $budget_items['id']; ?>Label">
                    <?php _t("Delete"); ?> : <?php echo $budget_items['id']; ?>
                </h4>
            </div>

            <div class="modal-body">
                <?php _t("Are you sure you want to delete"); ?>
            </div>

            <div class="modal-footer">  
                <a class="btn btn-danger" href="index.php?c=budgets&a=ok_lines_delete&id=<?php echo "$budget_items[id]"; ?>&redi=1">
                    <?php echo icon('trash'); ?>
                    <?php _t("Delete"); ?>
                </a>
            </div>

        </div>
    </div>
</div>