

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contacts_patients_add_new">
    <?php _t("New"); ?>
</button>


<div class="modal fade" id="contacts_patients_add_new" tabindex="-1" role="dialog" aria-labelledby="contacts_patients_add_newLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_patients_add_newLabel">
                    <?php _t("Add new patient"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#new" aria-controls="new" role="tab" data-toggle="tab"><?php _t("New"); ?></a></li>
                        <li role="presentation"><a href="#existing" aria-controls="existing" role="tab" data-toggle="tab"><?php _t("Existing contacts"); ?></a></li>    
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="new">
                            <h3><?php _t("New patient"); ?></h3>
                            <?php include "form_der_contacts_patients_add_new.php"; ?>    
                        </div>
                        <div role="tabpanel" class="tab-pane" id="existing">
                            <h3><?php _t("New patient from a contacts list"); ?></h3>
                            <?php include "form_der_contacts_patients_add.php"; ?>
                        </div>       
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>