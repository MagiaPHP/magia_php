<form action="index.php" method="post" class="form">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="linesAddOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="quantity" value="1"> 
    <input type="hidden" name="separator" value="0"> 
    <input type="hidden" name="note" value="1"> 

    <input type="hidden" name="tax" value="0"> 
    <input type="hidden" name="discounts" value="0"> 
    <input type="hidden" name="discounts_mode" value="%"> 


    <div class="form-group">
        <label for="description"></label>




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
            ><?php // echo $line['description'];    ?></textarea>


    </div>

    <button type="submit" class="btn btn-info">
        <?php _t("Add"); ?>
    </button>  

</form>
