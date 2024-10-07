<form method="post" action="index.php">

    <input type="hidden" name="c" value="hr_payroll">
    <input type="hidden" name="a" value="ok_update_account_number">
    <input type="hidden" name="id" value="<?php echo $hr_payroll->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="6">

    <div class="form-group">
        <label for="account_number"><?php _t("Account number"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="account_number" 
            id="account_number" 
            placeholder="<?php echo _t("Account number"); ?>"
            value="<?php echo $hr_payroll->getAccount_number(); ?>"
            >
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Update"); ?>
    </button>

</form>