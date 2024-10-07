

<form method="get" action="index.php" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="import_check">
    <input type="hidden" name="update" value="1">
    <input type="hidden" name="file" value="<?php echo $file; ?>">

    <div class="form-group">
        <label class="sr-only" for="account_number"><?php _t("Account number"); ?></label>
        <select class="form-control" name="account_number" onchange="this.form.submit()">
            <?php
            foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {
                $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";
                echo '<option value="' . $blbci['account_number'] . '"  ' . $selected . '>' . $blbci['bank'] . ' -  ' . $blbci['account_number'] . '  </option>';
            }
            ?>
        </select>
    </div>
    <?php
    /**
     *
     * <button type="submit" class="btn btn-default">
      <?php echo icon('refresh'); ?>
      <?php _t("Change"); ?>
      </button>

     */
    ?>

</form>
