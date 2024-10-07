<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("By client"); ?>
    </div>
    <div class="panel-body">

        <form method="get" action="index.php">
            <input type="hidden" name="c" value="invoice_lines">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="client_id">

            <div class="form-group">
                <label for="client_id"><?php _t("Client"); ?></label>
                <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
                    <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
                    <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                        <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                            <?php
                            foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                                $selected = (isset($id) && $contacts_list['id'] == $id ) ? " selected " : "";
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








            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>
    </div>
</div>