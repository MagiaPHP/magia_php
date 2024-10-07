

<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_date_end_update">
    <input type="hidden" name="id" value="<?php echo $projects->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("Date end"); ?></label>
        <input type="date" class="form-control" id="new_data" name="new_data" placeholder="" value="<?php echo $projects->getDate_end(); ?>">
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon('refresh'); ?>
        <?php _t("Update"); ?>
    </button>

</form>

