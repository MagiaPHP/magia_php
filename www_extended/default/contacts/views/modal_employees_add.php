<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contacts_employees_add">
    <?php _t("New"); ?>
</button>


<div class="modal fade" id="contacts_employees_add" tabindex="-1" role="dialog" aria-labelledby="contacts_employees_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_employees_addLabel">
                    <?php echo _t("Add new employee"); ?>
                </h4>
            </div>
            <div class="modal-body">                
                <?php include "form_contacts_employees_add.php"; ?>              
            </div>
        </div>
    </div>
</div>