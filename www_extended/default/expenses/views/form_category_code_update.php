<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_category_code_update">                    
    <input type="hidden" name="expense_id" value="<?php echo $expense->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="2">

    <div class="form-group">
        <label class="sr-only" for="category_code"><?php _t("My reference"); ?></label>
        <select 
            class="form-control selectpicker" 
            data-live-search="true"
            name="category_code"
            id="category_code"
            onchange="this.form.submit()"
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