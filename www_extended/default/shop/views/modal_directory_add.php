<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contacts_directory_add">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add new"); ?>
</button>




<div class="modal fade" id="contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data"); ?></h4>
            </div>
            <div class="modal-body">

                <?php echo $id; ?>


                <?php // include "form_directory_by_office_add.php"; ?>
                <?php include "form_directory_add.php"; ?>


            </div>


        </div>
    </div>
</div>