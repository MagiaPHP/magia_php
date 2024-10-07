<form action="index.php" method="post" class="form-inline">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="linesAddOk"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="quantity" value="1"> 
    <input type="hidden" name="separator" value="1"> 

    <input type="hidden" name="tax" value="0"> 
    <input type="hidden" name="discounts" value="0"> 
    <input type="hidden" name="discounts_mode" value="%"> 


    <div class="form-group">
        <label for="description"></label>
        <input 
            type="text" 
            class="form-control" 
            name="description" 
            id="description" 
            placeholder="<?php _t("Saparator name"); ?>" 
            value="Separator">
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Add separator"); ?></button>                        
</form>
