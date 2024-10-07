<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cloudAddBudget_<?php echo $contact["tva"]; ?>">
    <?php _t("New budget"); ?>
    <span class="glyphicon glyphicon-chevron-right"></span>

</button>

<!-- Modal -->
<div class="modal fade" id="cloudAddBudget_<?php echo $contact["tva"]; ?>" tabindex="-1" role="dialog" aria-labelledby="cloudAddBudgetLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="cloudAddBudgetLabel"><?php _t('Budget'); ?><?php //echo $contact["tva"];        ?></h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Create a budget for this company"); ?></h3>

                <p>
                    <?php _t("This company is already in your contacts"); ?>
                </p>

                <p><b><?php echo $contact["c_name"]; ?></b></p>
                <p><?php echo $contact["tva"]; ?></p>
                <p><?php echo '' . $contact["number"] . ' ' . $contact["address"] . ' ' . $contact["postcode"] . ' - ' . $contact["city"] . ' ' . $contact["country"] . ' '; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    <?php _t("Create new budget"); ?>
                </button>
            </div>
        </div>
    </div>
</div>