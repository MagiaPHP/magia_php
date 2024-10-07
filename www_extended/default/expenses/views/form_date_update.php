<form class="form-inline" method="post" action="index.php">

    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_date_update">
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">    
    <input type="hidden" name="redi[redi]" value="2">



    <div class="form-group">
        <label for="date" class="sr-only">
            <?php _t("Date"); ?>
        </label>
        <input 
            type="date" 
            class="form-control" 
            id="date" 
            name="date" 
            placeholder=""
            value="<?php echo $expense->getDate(); ?>"
            >
    </div>


    <button type="submit" class="btn btn-default">
        <?php _t("Change"); ?>
    </button>

</form>
