
<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#budget_items_<?php echo "$line[id]"; ?>"

    >

    <?php echo icon('pencil') ?>

</button>




<div 
    class="modal fade" 
    id="budget_items_<?php echo "$line[id]"; ?>" 
    tabindex="-1" 
    role="dialog" aria-labelledby="budget_items_<?php echo "$line[id]"; ?>Label"

    >

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="budget_items_<?php echo "$line[id]"; ?>Label"
                    >
                        <?php _t("Update butget line"); ?> 
                        <?php echo "$line[id]"; ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php include "form_items_edit_line_category.php"; ?>

            </div>              
        </div>
    </div>
</div>   
