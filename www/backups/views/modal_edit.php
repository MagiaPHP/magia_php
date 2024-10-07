
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#backups_edit_">
    <?php echo icon("pencil"); ?>
    <?php _t("Edit"); ?>
</button>


<div class="modal fade" id="backups_edit_" tabindex="-1" role="dialog" aria-labelledby="backups_edit_Label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="backups_edit_Label"> <?php _t("Edit"); ?></h4>
      </div>
      
      <div class="modal-body">
        <?php include view("backups","form_edit"   , $arg = ["redi" => 1]); ?>
      </div>
      

    </div>
  </div>
</div>