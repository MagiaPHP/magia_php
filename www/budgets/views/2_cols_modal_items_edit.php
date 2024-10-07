<button 
    type="button" 
    class="btn btn-primary btn-md" 
    data-toggle="modal" 
    data-target="#budget_modal_edit<?php echo $line->getId(); ?>"
    >
        <?php echo icon("pencil"); ?>
</button>

<div 
    class="modal fade" 
    id="budget_modal_edit<?php echo $line->getId(); ?>" 
    tabindex="-1" 
    role="dialog" aria-labelledby="budget_modal_edit<?php echo $line->getId(); ?>Label"
    >

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 
                    class="modal-title" 
                    id="budget_modal_edit<?php echo $line->getId(); ?>Label"
                    >
                        <?php _t("Update butget line"); ?> 
                        <?php echo $line->getId(); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                //vardump($budget_items); 

                include "2_cols_form_items_edit.php";
                ?>

            </div>              
        </div>
    </div>
</div>   
