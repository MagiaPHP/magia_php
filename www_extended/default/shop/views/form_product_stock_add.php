<form action="index.php" method="get">
    <input type="hidden" name="c" value="products">
    <input type="hidden" name="a" value="ok_stock_add">
    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
    <input type="hidden" name="office_id" value="<?php echo $office['id']; ?>">


    <div class="form-group">
        <label for="stock">
            <?php _t("Stock actual"); ?>
        </label>
        <select class="form-control" name="office_id" id="office_id">
            <?php
            foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) {
                echo "<option value=\"$office[id]\">" . contacts_formated($office[id]) . "</option>";
            }
            ?>
        </select>
    </div>




    <div class="form-group">
        <label for="stock">
            <?php _t("Stock actual"); ?>
        </label>
        <input type="number" name="stock" class="form-control" id="stock" placeholder="">
    </div>




    <div class="form-group">
        <label for="stock_max">
            <?php _t("Stock max"); ?>
        </label>
        <input type="number" name="stock_max" class="form-control" id="stock_max" placeholder="">
    </div>

    <div class="form-group">
        <label for="stock_min">
            <?php _t("Stock min."); ?>
        </label>
        <input type="number" name="stock_min" class="form-control" id="stock_min" placeholder="">
    </div>




    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>



