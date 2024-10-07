<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "providers"); ?>
        <?php echo _t("By company_id"); ?>
    </a>
    <?php
    foreach (providers_unique_from_col("company_id") as $company_id) {
        if ($company_id['company_id'] != "") {
            echo '<a href="index.php?c=providers&a=search&w=by_company_id&company_id=' . $company_id['company_id'] . '" class="list-group-item">' . $company_id['company_id'] . '</a>';
        }
    }
    ?>
</div>