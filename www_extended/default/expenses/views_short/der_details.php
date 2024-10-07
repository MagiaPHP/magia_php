<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
        <li role="presentation"><a href="#preview" aria-controls="preview" role="tab" data-toggle="tab"><?php echo icon('eye-open') ?> <?php _t("Preview"); ?></a></li>
        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <?php include "details_der_status.php"; ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="preview">

            <?php include "details_der_preview.php"; ?>

        </div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
    </div>

</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("My client number"); ?>
    </div>
    <div class="panel-body">


        <p class="help-block"><?php _t("My customer number with this provider"); ?></p>


        <form class="form-inline">
            <div class="form-group">
                <label for="client_number" class="sr-only"><?php _t("Client number"); ?></label>
                <input type="text" class="form-control" id="client_number"  name="client_number" placeholder="XYZ-123">
            </div>
            <button type="submit" class="btn btn-default">
                <?php _t("Update"); ?>
            </button>
        </form>


    </div>
</div>


























<?php
vardump($expense);
?>




