<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_invoice_create_one">
    <span class="glyphicon glyphicon-plus-sign"></span> <?php _t("Accept and create a single invoice"); ?>
</button>


<div class="modal fade" id="modal_invoice_create_one" tabindex="-1" role="dialog" aria-labelledby="modal_invoice_create_oneLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_invoice_create_oneLabel"><?php _t("Create a single invoice"); ?></h4>
            </div>
            <div class="modal-body">
                <h2><?php _t("Create a single invoice"); ?></h2>

                <p><?php _t("You wil be create a single invoice from this budget"); ?></p>


                <?php include "form_invoice_create_one.php"; ?>
            </div>


        </div>
    </div>
</div>