<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add');
}
?>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_add_multi">
    <input type="hidden" name="budget_id" value="null">

    <input type="hidden" name="counter" value="<?php echo invoices_counter_next_number(date('Y')); ?>">

    <br>



    <?php # cliente_id  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Contacts"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
                <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) {  ?>
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
    </div>
    <?php # /cliente_id     ?>







    <?php
    $final_date = $date_expiration;
    for ($i = 1; $i <= $max; $i++) {
        $time = strtotime($final_date);
        $final_date = date("Y-m-d", strtotime("+" . "$intervalo $intervalo_date", $time));
        ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="date_expiration"><?php _t("Invoice"); ?>: <?php echo $i; ?></label>
            <div class="col-sm-4">
                <input
                    type="date" name="multi[<?php echo $i; ?>][date_expiration]" class="form-control" id="date_expiration" placeholder=""
                    value="<?php echo $final_date; ?>"
                    >                        
            </div>
            <div class="col-sm-4">
                <input
                    type="number" name="multi[<?php echo $i; ?>][total]" step="any"
                    class="form-control" id="total" placeholder="<?php _t('Total'); ?>"
                    value="<?php echo $total; ?>"
                    >                        
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="title"></label>
            <div class="col-sm-8">
                <input type="text"  name="multi[<?php echo $i; ?>][title]" class="form-control" id="title" placeholder="<?php _t("Title"); ?>"
                       value="<?php echo $title; ?>: <?php echo $i; ?>"
                       >
            </div>
        </div>


    <?php }
    ?>
    <?php # /date_expiration      ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Create the invoice"); ?>">
        </div>      							
    </div>      							

</form>