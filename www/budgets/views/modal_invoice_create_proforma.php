<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_invoice_create_proforma">
    <span class="glyphicon glyphicon-print"></span> 
    <?php _t("Print invoice proforma"); ?>
</button>


<div class="modal fade" id="modal_invoice_create_proforma" tabindex="-1" role="dialog" aria-labelledby="modal_invoice_create_proformaLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_invoice_create_proformaLabel">
                    <?php _t("Print invoice proforma"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <p>
                    <?php _t("Print a proforma invoice"); ?>                
                </p>


                <p>

                    <?php
                    //print_icon_nav("index.php?c=budgets&a=export_pdf&id=$id", budgets_field_id('client_id', $id), (modules_field_module('status', 'audio')) ? _tr("Delivery note") : _tr("Budgets"));

                    print_dropdown("index.php?c=budgets&a=export_proforma&id=$id", budgets_field_id('client_id', $id), _tr("Print invoice proforma"));
                    ?>

                <hr>

                <a href="" class="btn btn-primary">Print</a>
                </p>


            </div>


        </div>
    </div>
</div>