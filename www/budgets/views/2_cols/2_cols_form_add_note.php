<form action="index.php" method="post" class="form">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_note_add"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi[redi]" value="1"> 



    <div class="form-group">
        <label for="description" class="sr-only"></label>

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
            ></textarea>


    </div>

    <button type="submit" class="btn btn-info">
        <?php _t("Add"); ?>
    </button>  

</form>
