<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#order_new_cancel">
    <span class="glyphicon glyphicon-trash"></span>
    <?php _t("Cancel"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="order_new_cancel" tabindex="-1" role="dialog" aria-labelledby="order_new_cancelLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="order_new_cancelLabel">
                    <?php _t("Cancel order"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Atention"); ?></h3>

                <p>
                    <?php _t("You are going to cancel this order, do you really want to do it?"); ?>
                </p>

                <?php
                include "form_order_new_cancel.php";
                ?>
            </div>


        </div>
    </div>
</div>