
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModalChangeClient">
    <span class="glyphicon glyphicon-edit"></span> 
    <?php _t("Change client"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModalChangeClient" tabindex="-1" role="dialog" aria-labelledby="myModalChangeClientLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalChangeClientLabel">
                    <?php _t('Change client'); ?>
                </h4>
            </div>
            <div class="modal-body">






                <?php
                if (!invoices_can_change_client($id, invoices_field_id('client_id', $id))) {
                    echo "<h3>";
                    _t("You cannot change clients for the following reasons");
                    echo "</h3>";

                    echo "<ul>";
                    foreach (invoices_why_can_not_change_client($id, invoices_field_id('client_id', $id)) as $key => $value) {
                        echo "<li>$value</li>";
                    }
                    echo "</ul>";
                } else {

                    echo "<h3>";
                    _t("Plase choose an new client");
                    echo "</h3>";

                    include "form_client_update.php";
                }
                ?>


            </div>





        </div>
    </div>
</div>