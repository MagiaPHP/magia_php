<form action="index.php" method="get">
    <input type="hidden" name="c" value="products">
    <input type="hidden" name="a" value="ok_stock_min_update">
    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
    <input type="hidden" name="office_id" value="<?php echo $office['id']; ?>">





    <div class="form-group">
        <label for="new_stock">
            <?php _t("New stock"); ?>
        </label>
        <input type="number" name="new_stock" class="form-control" id="new_stock" placeholder="">
    </div>



    <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
</form>



