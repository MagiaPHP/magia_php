<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_ce_update">
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">    
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label for="date" class="sr-only">
            <?php _t("Structured communication"); ?>
        </label>
        <input 
            type="text" 
            class="form-control" 
            id="ce" 
            name="ce" 
            placeholder="+++000/1234/12345+++"
            value="<?php echo $expense->getCe(); ?>"
            required=""
            >
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?>  
        <?php _t("Change"); ?>
    </button>

</form>
