

<p class="text-center">
    <?php
    logo(150);
    // http://localhost/factux_46/index.php?c=app
    // 2024-3 
    // 2024011305365965a2136b21c061963
    ?>
</p>

<form method="get" action="index.php">
    
    <input type="hidden" name="c" value="app">
    
    <?php
    if (_options_option('config_budgets_accept_via_web')) {
        //
        $checked_budget = ($a == 'budgets') ? " checked " : "";
        //
        ?>
        <div class="radio">
            <label>
                <input 
                    type="radio" 
                    name="a" 
                    id="a" 
                    value="budgets"  
                    required=""  
                    <?php echo $checked_budget; ?>
                    >
                    <?php _t("Budgets"); ?> 
            </label>
        </div>
    <?php } ?>
    <?php
    if (_options_option('config_invoices_see_via_web')) {
        $checked_invoice = ($a == 'invoices') ? " checked " : "";
        ?>
        <div class="radio">
            <label>
                <input 
                    type="radio" 
                    name="a" 
                    id="a" 
                    value="invoices" 
                    required=""
                    <?php echo $checked_invoice; ?>
                    >
                    <?php _t("Invoices"); ?>
            </label>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="id"><?php _t("ID"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="id" 
            placeholder="Number" 
            name="id"
            value="<?php echo $id; ?>"
            required=""
            >
    </div>
    <div class="form-group">
        <label for="code"><?php _t("Code"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            id="code" 
            placeholder="Code" 
            name="code"
            value="<?php echo $code; ?>"
            required=""
            >
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t('Search'); ?>
    </button>
</form>

