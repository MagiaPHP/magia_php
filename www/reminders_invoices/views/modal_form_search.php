
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reminders_invoices_search_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Search"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="reminders_invoices__search_" tabindex="-1" role="dialog" aria-labelledby="reminders_invoices_search_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="reminders_invoices_search_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include views("reminders_invoices", "form_search", $arg = ["redi" => 1]); ?>
            </div>



        </div>
    </div>
</div>