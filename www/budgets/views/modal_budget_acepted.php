<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_budget_acepted">
    <span class="glyphicon glyphicon-ok"></span> 
    <?php _t("Create an invoice"); ?>
</button>
<div class="modal fade" id="modal_budget_acepted" tabindex="-1" role="dialog" aria-labelledby="modal_budget_acepted">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_budget_acepted">
                    <?php _t("Budget"); ?> <?php echo $id; ?> : <?php _t("Accepted"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Do you want to create an invoice?"); ?></h3>
                <?php
                include "tab_creation_invoices.php";
                ?>
                <p></p>
            </div>
        </div>
    </div>
</div>