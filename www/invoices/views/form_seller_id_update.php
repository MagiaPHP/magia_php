<?php
$id = $params['id'];
//vardump($params);
?>


<form action="index.php" method="post" class="form-horizontal">
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="ok_seller_id_update"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi[redi]" value="1"> 



    <div class="form-group">
        <label for="comments" class="col-sm-2 control-label"><?php _t("Seller"); ?></label>
        <div class="col-sm-10">

            <select 
                class="form-control selectpicker" data-live-search="true" 
                name="seller_id" 
                required="">
                <option value="null"><?php _t("Select one"); ?></option>
                <?php
                foreach (employees_list_by_company(1022) as $key => $employees_list_by_company) {

                    $selected = ($employees_list_by_company['contact_id'] == $params['seller_id']) ? " selected " : "";

                    echo '<option value="' . $employees_list_by_company['contact_id'] . '" ' . $selected . ' >' . contacts_formated($employees_list_by_company['contact_id']) . '</option>';
                }
                ?>
            </select>


        </div>
    </div>



    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default"><?php _t("Send"); ?></button>
        </div>
    </div>
</form>