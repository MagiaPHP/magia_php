<form method="post" action="index.php">

    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_client_update">
    <input type="hidden" name="id" value="<?php echo $budgets['id']; ?>">

    <div class="form-group">
        <label for="contact"><?php _t("Company name"); ?></label>

        <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
            <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                    <?php
                    foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                        $selected = ($budgets['client_id'] == $contacts_list['id'] ) ? " selected " : "";
                        // no se muestra la emrpea 1022
                        // osea la empresa que factura
                        if ($contacts_list['id'] != _options_option('default_id_company')) {
                            ?>
                            <option value="<?php echo "$contacts_list[id]"; ?>" <?php echo $selected; ?>>
                                <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </optgroup>
            <?php } ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>

