<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dateEdit">
    <span class="glyphicon glyphicon-new-window"></span>
    <?php _t("Change date"); ?>
</button>
<div class="modal fade" id="dateEdit" tabindex="-1" role="dialog" aria-labelledby="dateEditLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="dateEditLabel">
                    <?php _t("Edit"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Registre date"); ?></h3>
                <p>
                    <?php _t("The document creation date"); ?>
                </p>

                <?php include view('budgets', 'form_date_update'); ?>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Budgets date"); ?></div>
    <div class="panel-body">

        <?php echo $budgets['date']; ?>
        <?php //include view('budgets', 'form_date_update'); ?> 
    </div>
</div>





<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#dateEdit">
    <span class="glyphicon glyphicon-new-window"></span>
    <?php _t("Change date"); ?>
</button>
<div class="modal fade" id="dateEdit" tabindex="-1" role="dialog" aria-labelledby="dateEditLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="dateEditLabel">
                    <?php _t("Edit"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Registre date"); ?></h3>
                <p>
                    <?php _t("The document creation date"); ?>
                </p>

                <?php include view('budgets', 'form_date_update'); ?>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php _t("Close"); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Expiration date"); ?></div>
    <div class="panel-body">
        <?php include view('budgets', 'form_date_expiration_update'); ?>
    </div>
</div> 





