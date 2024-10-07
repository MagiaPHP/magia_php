<button 
    type="button" 
    class="btn btn-danger btn-md" 
    data-toggle="modal" 
    data-target="#myModalEdit<?php echo "$expense_items[id]"; ?>">
    <span class="glyphicon glyphicon-trash"></span>  
</button>


<div 
    class="modal fade" 
    id="myModalEdit<?php echo "$expense_items[id]"; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="myModalEditLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalEditLabel">
                    <?php _t('Delete'); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Are you sure you want to delete it"); ?>?</h2>

                <a class="btn btn-danger" href="index.php?c=expenses&a=linesDeleteOk&id=<?php echo "$expense_items[id]"; ?>">
                    <span class="glyphicon glyphicon-trash"></span>
                    <?php _t("Delete"); ?> 
                </a>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>

            </div>
        </div>
    </div>
</div>