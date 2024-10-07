

<form class="" method="post" action="index.php">

    <input type="hidden" name="c" value="projects">
    <input type="hidden" name="a" value="ok_address_update">
    <input type="hidden" name="id" value="<?php echo $projects->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("New Address"); ?></label>
        <textarea class="form-control" name="new_data" id="new_data"><?php echo $projects->getAddress(); ?></textarea>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon('refresh'); ?>
        <?php _t("Update"); ?>
    </button>

</form>

