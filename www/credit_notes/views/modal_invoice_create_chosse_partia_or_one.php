<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_invoice_create_one">
    <span class="glyphicon glyphicon-plus-sign"></span> 
    <?php _t("Create invoice"); ?>
</button>


<div class="modal fade" id="modal_invoice_create_one" tabindex="-1" role="dialog" aria-labelledby="modal_invoice_create_oneLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_invoice_create_oneLabel">
                    <?php _t("Create invoice"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <p>
                    <?php //_t("You can choose whether to create an invoice with the entire credit_note, or you can create a partial invoice"); ?>
                    <?php _t("Please choose the most suitable option"); ?>
                </p>


                <?php //include "form_invoice_create_one.php" ; ?>
                <?php
                include "tab_creation_invoices.php";

// esto es para facturas parciales
//include "tab_creation_invoices.php"; 
                ?>


            </div>


        </div>
    </div>
</div>