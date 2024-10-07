<a href="#" data-toggle="modal" data-target="#remove_from_project_<?php echo $inv->getId(); ?>">
    <span class="glyphicon glyphicon-trash"></span>
</a>

<div 
    class="modal fade" 
    id="remove_from_project_<?php echo $inv->getId(); ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="remove_from_project_Label">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="remove_from_project_Label">
                    <?php _t("Cancel payment"); ?> <?php echo $inv->getId(); ?>
                </h4>

            </div>
            <div class="modal-body">
                <?php
                /**
                 * Remove invoice from project_inout
                 */
                ?>
                <h3><?php _t("You will be removed this invoice from this project"); ?></h3>

                <p>
                    <a class="btn btn-danger" href="index.php?c=projects_inout&a=ok_remove_invoice&invoice_id=<?php echo $inv->getId(); ?>&project_id=<?php echo $pinout->getProject_id(); ?>&redi[redi]=6#" >
                        <?php _t("Yes, cancel"); ?>
                    </a>
                </p>




            </div>


        </div>
    </div>
</div>
