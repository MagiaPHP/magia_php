<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Send to customer"); ?></h3>
    </div>
    <div class="panel-body">

        <p>
            <?php _t("An email is sent to the client with the credit_note as an attachment"); ?>
        </p>

        <?php if (directory_search_data_by_contact_id("Email", $credit_notes["client_id"])) { ?> 
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#send">
                <span class="glyphicon glyphicon-envelope"></span>
                <?php _t("Send"); ?>
            </button>
            <?php
        } else {
            message("info", "This contact does not have an email");
        }
        ?>

    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="send" tabindex="-1" role="dialog" aria-labelledby="sendLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="sendLabel"><?php _t("Send email"); ?></h4>
            </div>
            <div class="modal-body">

                <?php include "form_send_credit_note.php"; ?>
            </div>
        </div>
    </div>
</div>
