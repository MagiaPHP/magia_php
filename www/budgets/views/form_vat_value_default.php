<form class="form-inline" method="post">
    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_vat_value_default">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg['redi']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $arg['id']; ?>">



    <div class="form-group">
        <div class="input-group">

            <select name="data" class="form-control">
                <?php
                foreach (country_tax_list_by_country(addresses_billing_by_contact_id($u_owner_id)['country']) as $key => $ctlbc) {

                    $selected = (_options_option("config_budgets_vat_value_default") == $ctlbc['tax'] ) ? " selected " : "";

                    echo '<option value="' . $ctlbc['tax'] . '" ' . $selected . '>' . $ctlbc['tax'] . ' % </option>';
                }
                ?>
            </select>


        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        <?php _t("Add"); ?>
    </button>
</form>



