<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="ok_project_update"> 
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>"> 

    <div class="form-group">
        <label for="project_id" class="col-sm-2 control-label"><?php _t("Project"); ?></label>

        <div class="col-sm-10">

            <select class="form-control" name="project_id">
                <?php
//                foreach (projects_list_by_contact_id(invoices_field_id('client_id', $id)) as $key => $value) {
                foreach (projects_list() as $key => $value) {
                    echo '<option value="' . $value['id'] . '">' . $value['name'] . '</option>';
                }
                ?>
            </select>

        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
        </div>
    </div>
</form>