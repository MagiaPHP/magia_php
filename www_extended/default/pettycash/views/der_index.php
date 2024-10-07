<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Record a transaction"); ?>
    </div>
    <div class="panel-body">
        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation"><a href="#in" aria-controls="in" role="tab" data-toggle="tab"><?php echo icon("plus"); ?> <?php _t("Recette") ?></a></li>
                <li role="presentation" class="active"><a href="#out" aria-controls="out" role="tab" data-toggle="tab"><?php echo icon("minus"); ?> <?php _t("Depenses"); ?></a></li>

            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="in">
                    <br>
                    <?php include "form_add_in.php"; ?>
                </div>
                <div role="tabpanel" class="tab-pane active" id="out">
                    <br>
                    <?php include "form_add_out.php"; ?>
                </div>
            </div>
        </div>
    </div>
</div>
