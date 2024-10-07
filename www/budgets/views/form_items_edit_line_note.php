<form action="index.php" method="get">
    <input type="hidden"  name="c" value="budgets">
    <input type="hidden"  name="a" value="ok_note_update">
    <input type="hidden"  name="id" value="<?php echo "$budget_items[id]"; ?>">
    <input type="hidden"  name="budget_id" value="<?php echo $id; ?>">
    <input type="hidden"  name="redi[redi]" value="1">




    <div class="form-group">
        <label for="description"><?php _t("Note"); ?></label>

        <textarea 
            class="form-control" 
            name='description' 
            id="description"
            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_budgets_description_maxlength"); ?> <?php _t("characters"); ?>)" 
            autofocus=""
            value="" 
            required=""
            rows='5'
            maxlength='<?php echo _options_option("config_budgets_description_maxlength"); ?>'
            ><?php echo $note_description; ?></textarea>
    </div>

    <button type="submit" class="btn btn-info">
        <?php echo icon('comment'); ?>

        <?php _t("Update"); ?>
    </button>

</form>          
