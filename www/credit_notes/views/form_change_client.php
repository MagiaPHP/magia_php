    

<form method="post" action="index.php">

    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_change_client">
    <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label for="new_client_id"><?php _t("Company name"); ?></label>

        <select class="form-control selectpicker" data-live-search="true" name="new_client_id" required="">
            <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
            <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                    <?php
                    foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {

                        $selected = (isset($contacts_list['id']) && $cn->getClient_id() == $contacts_list['id'] ) ? " selected " : "";
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



    <?php
    $headoffice_id = offices_headoffice_of_office($cn->getClient_id());
    ?>    



    <button type="submit" class="btn btn-default"><?php _t("Change"); ?></button>
</form>

