<form class="form-horizontal">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_change_status">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <div class="form-group">
        <label for="status" class="col-sm-2 control-label"><?php _t("Status"); ?></label>
        <div class="col-sm-10">
            <select class="form-control" name="status">
                <option value="10"><?php echo credit_note_status_by_status(10); ?></option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">
                <?php _t("Change"); ?>
            </button>
        </div>
    </div>


</form>