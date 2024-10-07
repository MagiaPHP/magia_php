<form class="form-horizontal">

    <div class="form-group">
        <label for="contact_id" class="col-sm-3 control-label"><?php _t("Contact"); ?></label>
        <div class="col-sm-9">
            <select class="form_control" name="contact_id" id="contact_id">
                <option value="all"><?php _t("All"); ?></option>
                <?php foreach (contacts_list_by_type(1) as $key => $value) { ?>
                    <option></option>
                <?php } ?>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label for="invoice_id" class="col-sm-3 control-label"><?php _t("Invoice"); ?></label>
        <div class="col-sm-9">

            <select class="form-control" name="invoice_id" >
                <option value="all"><?php _t("All"); ?></option>
                <?php foreach (invoices_list() as $key => $invoice) { ?>
                    <option value="<?php echo $invoice['id']; ?>">
                        <?php echo $invoice['id']; ?>

                    </option>
                <?php } ?>                                
            </select>


        </div>
    </div>    



    <div class="form-group">
        <label for="type" class="col-sm-3 control-label"><?php _t("Type"); ?></label>
        <div class="col-sm-9">
            <select class="form-control" name="type" >
                <option value="all"><?php _t("All"); ?></option>
                <option value="1"><?php echo _t("In"); ?></option>
                <option value="-1"><?php echo _t("Out"); ?></option>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label for="account_number" class="col-sm-3 control-label"><?php _t("Account number"); ?></label>
        <div class="col-sm-9">
            <select class="form-control" name="account_number" >
                <option value="all"><?php _t("All"); ?></option>

                <?php foreach (banks_list_by_contact_id(u_owner_id()) as $key => $bank) { ?>
                    <option value="<?php echo $bank['account_number']; ?>">
                        <?php echo $bank['bank']; ?>
                        <?php echo $bank['account_number']; ?>
                    </option>
                <?php } ?>                                
            </select>
        </div>
    </div>    






    <div class="form-group">
        <label for="total" class="col-sm-3 control-label"><?php _t("Total"); ?></label>
        <div class="col-sm-3">
            <select class="form-control" name="">
                <option value="all"><?php _t("All"); ?></option>
                <option value="" >> <?php _t("Higher than"); ?></option>
                <option value="" >= <?php _t("Same than"); ?></option>
                <option value="" >< <?php _t("Lower than"); ?></option>
            </select>
        </div>

        <div class="col-sm-5">
            <input type="text" name="total" class="form-control" id="total" placeholder="">
        </div>
    </div>




    <div class="form-group">
        <label for="total" class="col-sm-3 control-label"><?php _t("Date"); ?></label>
        <div class="col-sm-3">
            <select class="form-control" name="">
                <option value="all"><?php _t("All"); ?></option>
                <option value="" ><?php _t("In this date"); ?></option>
                <option value="" ><?php _t("After this date"); ?></option>
                <option value="" ><?php _t("Before this date"); ?></option>                
            </select>
        </div>

        <div class="col-sm-5">
            <input type="text" name="total" class="form-control" id="total" placeholder="">
        </div>
    </div>


    <div class="form-group">
        <label for="total" class="col-sm-3 control-label"><?php _t("Ref"); ?></label>
        <div class="col-sm-3">
            <select class="form-control" name="">
                <option value="all"><?php _t("All"); ?></option>
                <option value="" ><?php _t("This reference"); ?></option>
                <option value="" ><?php _t("After this reference"); ?></option>
                <option value="" ><?php _t("Before this reference"); ?></option>                
            </select>
        </div>

        <div class="col-sm-5">
            <input type="text" name="total" class="form-control" id="total" placeholder="">
        </div>
    </div>






    <div class="form-group">
        <label for="description" class="col-sm-3 control-label"><?php _t("Description"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="description" class="form-control" id="description" placeholder="">
        </div>
    </div>



    <div class="form-group">
        <label for="ce" class="col-sm-3 control-label"><?php _t("Structured communication"); ?></label>
        <div class="col-sm-9">
            <input type="text" name="ce" class="form-control" id="ce" placeholder="+++000/2020/12907+++">
        </div>
    </div>










    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox">
                <label>
                    <input type="checkbox"> <?php _t("Only canceled"); ?>
                </label>
            </div>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </div>
    </div>


</form>