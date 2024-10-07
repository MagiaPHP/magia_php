

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#patient_empreintes_add">
    <?php _t("Add new empreinte"); ?>
</button>



<div class="modal fade" id="patient_empreintes_add" tabindex="-1" role="dialog" aria-labelledby="patient_empreintes_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="patient_empreintes_addLabel">
                    <?php _t("Add new empreinte"); ?>                
                </h4>
            </div>
            <div class="modal-body">

                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>



                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">

                            <?php include "form_patient_empreintes_add.php"; ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <?php
                            include 'form_patient_empreintes_file_add.php';
                            ?>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages">...</div>
                        <div role="tabpanel" class="tab-pane" id="settings">...</div>
                    </div>

                </div>




            </div>
        </div>
    </div>
</div>