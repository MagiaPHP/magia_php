<form action="index.php" method="post" class="form-inline">                                                                                              
    <input type="hidden" name="c" value="budgets"> 
    <input type="hidden" name="a" value="ok_separator_add"> 
    <input type="hidden" name="budget_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi[redi]" value="1"> 



    <div class="form-group">
        <label for="description" class="sr-only"></label>
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
