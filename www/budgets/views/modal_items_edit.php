<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#budget_modal_edit<?php echo $budget_items['id']; ?>"
    >
        <?php echo icon("pencil"); ?>
</button>

<div 
    class="modal fade" 
    id="budget_modal_edit<?php echo $budget_items['id']; ?>" 
    tabindex="-1" 
    role="dialog" aria-labelledby="budget_modal_edit<?php echo $budget_items['id']; ?>Label"
    >

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="budget_modal_edit<?php echo $budget_items['id']; ?>Label"
                    >
                        <?php _t("Update butget line"); ?> 
                        <?php echo $budget_items['id']; ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                //vardump($budget_items); 

                include "form_items_edit.php";
                ?>

            </div>              
        </div>
    </div>
</div>   
