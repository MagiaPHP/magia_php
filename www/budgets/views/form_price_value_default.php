<form class="form-inline" method="post">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_price_value_default">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg['redi']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $arg['id']; ?>">



    <div class="form-group">
        <div class="input-group">
            <input 
                type="text" 
                name="data" 
                class="form-control" 
                id="data" 
                placeholder=""
                value="<?php echo _options_option("config_budgets_price_value_default") ?>"
                >      
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        <?php _t("Add"); ?>
    </button>
</form>



