
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#line_delete_<?php echo $line->getId(); ?>">
    <?php echo icon("trash"); ?>
</button>

<div 
    class="modal fade" 
    id="line_delete_<?php echo $line->getId(); ?>" 
    tabindex="-1" role="dialog" aria-labelledby="line_delete_<?php echo $line->getId(); ?>Label">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="line_delete_<?php echo $line->getId(); ?>Label"
                    >
                        <?php _t("Delete"); ?> 

                    <?php echo $line->getId(); ?>                    
                </h4>
            </div>

            <div class="modal-body">
                <?php _t("Are you sure you want to delete it"); ?>
            </div>

            <div class="modal-footer">
                <a class="btn btn-danger" href="index.php?c=budgets&a=ok_lines_delete&id=<?php echo $line->getId(); ?>&redi[redi]=1">
                    <?php echo icon("trash"); ?>
                    <?php echo _t("Delete"); ?>
                </a>
            </div>


        </div>              
    </div>
</div>
</div>   
