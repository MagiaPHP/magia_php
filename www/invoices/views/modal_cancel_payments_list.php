<a href="#" data-toggle="modal" data-target="#modal_payement_cancel_<?php echo $balance_item['id']; ?>">
    <span class="glyphicon glyphicon-trash"></span>
</a>

<div 
    class="modal fade" 
    id="modal_payement_cancel_<?php echo $balance_item['id']; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="modal_payement_cancelLabel">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal_payement_cancelLabel">
                    <?php _t("Cancel payment"); ?> <?php echo $balance_item['id']; ?>
                </h4>

            </div>
            <div class="modal-body">               


                <h3><?php _t("You will be cancel this transaction"); ?></h3>

                <?php
                include "form_payement_cancel.php";
                ?>

            </div>


        </div>
    </div>
</div>
