<form action="index.php" method="get">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="byCounter">


    <div class="form-group">
        <label for="client_id"><?php _t("Year"); ?></label>
        <select class="form-control selectpicker" data-live-search="true" name="client_id">
            <?php
            for ($i = 2021; $i < date('Y') + 1; $i++) {
                echo '<option value="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="status"><?php _t("Year"); ?></label>
        <input class="form-control" type="number" name="counter" id="counter" required="">
    </div>



    <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
</form>