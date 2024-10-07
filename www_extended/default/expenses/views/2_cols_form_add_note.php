<form action="index.php" method="post" class="form">                                                                                              
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="ok_lines_add"> 
    <input type="hidden" name="expense_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="quantity" value="1"> 
    <input type="hidden" name="separator" value="0"> 
    <input type="hidden" name="note" value="1"> 
    <input type="hidden" name="tax" value="0"> 
    <input type="hidden" name="discounts" value="0"> 
    <input type="hidden" name="discounts_mode" value="%"> 
    <input type="hidden" name="redi[redi]" value="1"> 


    <div class="form-group">
        <label for="description"></label>




        <textarea 
            class="form-control" 
            name='description' 
            id="description"
            placeholder="<?php _t("Description"); ?> (Max: <?php echo _options_option("config_expenses_description_maxlength"); ?> <?php _t("characters"); ?>)" 
            autofocus=""
            value="" 
            required=""
            rows='5'
            maxlength='<?php echo _options_option("config_expenses_description_maxlength"); ?>'
            ><?php echo _tr('Note'); ?></textarea>


    </div>

    <button type="submit" class="btn btn-info">
        <?php _t("Add"); ?>
    </button>  

</form>
