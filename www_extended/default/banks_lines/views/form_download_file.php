<form enctype="multipart/form-data" method="post" action="index.php">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="ok_import_check">    
    <input type="hidden" name="account_number" value="<?php echo (isset($account_number)) ? $account_number : ''; ?>">    
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="redi[redi]" value="5">
    <div class="form-group">
        <input type="file" accept=".csv,text/csv" id="file" name="file">

    </div>  
    <div class="form-group">
        <select class="form-control" name="account_number" required="">
            <option value=""><?php _t("Select a bank account"); ?></option>
            <?php
            foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {


                echo '<option value="' . $blbci['account_number'] . '" >' . $blbci['bank'] . ' ' . $blbci['account_number'] . '</option>';
            }
            ?>                                    
        </select>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("Submit"); ?>
    </button>
</form>