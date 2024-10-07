<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_project_update"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi" value="1"> 

    <div class="form-group">
        <label for="project_id" class="col-sm-2 control-label"><?php _t("Project"); ?></label>

        <div class="col-sm-10">
            <?php
            ?>
            <select class="form-control" name="project_id">
                <?php
                foreach (projects_search_by('contact_id', budgets_field_id('client_id', $id)) as $key => $plbci) {
                    echo '<option value="' . $plbci['id'] . '">' . $plbci['name'] . '</option>';
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