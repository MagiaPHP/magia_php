<form method="post" action="index.php">

    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_provider_invoice_number_update">                    
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">


    <div class="form-group">
        <label for="invoice_number"><?php _t("Invoice number"); ?></label>
        <input type="text" class="form-control" id="invoice_number" name="invoice_number" placeholder="">
    </div>

    <div class="form-group">
        <label for="provider_id"><?php _t("Provider"); ?></label>

        <select 
            class="form-control" 
            data-live-search="true" 
            name="provider_id"
            onchange="this.form.submit()"
            >

            <option value="null"><?php _t("Select one"); ?></option>

            <?php
            foreach (contacts_list() as $key => $cllp) {
                $selected = ($expense->get) ? " selected " : "";
                echo '<option value="' . $cllp['id'] . '">' . contacts_formated($cllp['id']) . '</option>';
            }
            ?>

            <option value="add"><?php _t("Add"); ?></option>

        </select>
    </div>

</form>



<form class="form-inline" >


    <div class="form-group">
        <label class="" for="provider_id"><?php _t("Provider"); ?></label>

        <select 
            class="form-control selectpicker" data-live-search="true"
            name="category_code"
            id="category_code"

            >
            <option value="null"><?php _t("Without category"); ?></option>
            <?php
            $selected = null;
            foreach (expenses_categories_list2() as $key => $ecl) {
                // el ultimo categoria registrada
                //    $selected = ($ecl['code'] == $expense_items['category_code']) ? " selected " : "";

                $selected = ($expense->getCategory_code() == $ecl['code'] ) ? " selected " : "";

                $has_child = (expenses_categories_childrens_of($ecl['code'])) ? true : false;
                if (!$has_child) {
                    echo '<option value="' . $ecl['code'] . '"  ' . $selected . '>' . $ecl['code'] . ' ' . $ecl['category'] . '</option>';
                }
                $selected = null;
            }
            ?>
        </select>                
    </div>                    

    <?php
    /**
     * <button type="submit" class="btn btn-primary">
      <?php echo icon('ok'); ?>
      </button>

     */
    ?>
</form>