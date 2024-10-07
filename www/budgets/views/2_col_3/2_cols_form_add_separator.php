<form action="index.php" method="post" class="form-inline">                                                                                              
    <input type="hidden" name="c" value="expenses"> 
    <input type="hidden" name="a" value="ok_lines_add"> 
    <input type="hidden" name="expense_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="status" value="1"> 
    <input type="hidden" name="quantity" value="1"> 
    <input type="hidden" name="separator" value="1"> 
    <input type="hidden" name="note" value="0"> 
    <input type="hidden" name="tax" value="0"> 
    <input type="hidden" name="discounts" value="0"> 
    <input type="hidden" name="discounts_mode" value="%"> 
    <input type="hidden" name="redi[redi]" value="1"> 


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

    <button type="submit" class="btn btn-success"><?php _t("Add"); ?></button>                        
</form>
