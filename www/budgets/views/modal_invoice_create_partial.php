<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#invoice_create_partial">
    <span class="glyphicon glyphicon-plus-sign"></span> <?php _t("Create partial invoice"); ?>
</button>


<div class="modal fade" id="invoice_create_partial" tabindex="-1" role="dialog" aria-labelledby="invoice_create_partialLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <h4 class="modal-title" id="invoice_create_partialLabel">
                    <?php _t("Create partial invoice"); ?>
                </h4>

            </div>

            <div class="modal-body">

                <p><?php _t("You are going to create a partial invoice"); ?></p>

                <?php
                include "form_invoice_create_partial.php";
                ?>
            </div>


        </div>
    </div>
</div>