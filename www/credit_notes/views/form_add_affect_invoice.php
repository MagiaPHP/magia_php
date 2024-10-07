<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_add_by_client">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="invoice_id"><?php _t("Invoice id"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="invoice_id" required="">
                <option value="2010">1020</option>
                <?php
                foreach (invoices_list() as $key => $inv_item) {
                    echo '<option value="' . $inv_item["id"] . '">' . $inv_item['id'] . ' - ' . contacts_formated($inv_item['client_id']) . '</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <?php # /id  ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next"); ?>">
        </div>      							
    </div>      							

</form>
