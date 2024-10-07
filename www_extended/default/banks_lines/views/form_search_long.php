<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input type="text" name="txt" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <select class="form-control" name="w">
            <option value="all"><?php _t("All fields"); ?></option>

            <?php
            foreach (magia_db_col_list_from_table('banks_lines') as $key => $madbcollft) {
                echo '<option value="by_' . $madbcollft . '">' . $madbcollft . '</option>';
            }
            ?>

        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("search"); ?> 
        <?php _t("Search"); ?>
    </button>

</form>