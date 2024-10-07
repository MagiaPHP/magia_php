<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_form_payement_registre">
    <?php _t("Registre payment"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="modal_form_payement_registre" tabindex="-1" role="dialog" aria-labelledby="modal_form_payement_registreLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_form_payement_registreLabel">
                    <?php _t("Recording payments manually"); ?>
                </h4>
            </div>

            <div class="modal-body">


                <p>
                    <?php _t("If you want to record payments with bank statements, you must activate the <code>banks transaction</code> module"); ?>
                </p>
                
                <br>

                <?php
                include "form_payement_registre.php";

                // Esto lo hacemos para tener esta caja en cualquier parte
//                $redi = 1; 
//                $ce = $invoices['ce'];
//                $total = 120;
//                $invoice_id = $id; 
                //include view('balance', 'form_add');
                ?>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>