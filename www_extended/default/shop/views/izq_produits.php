
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'products'); ?>
        <?php echo _t("Products"); ?>
    </a>
    <a href="index.php?c=shop&a=products" class="list-group-item"><?php _t("List all"); ?></a>

    <?php
    foreach (products_categories_list() as $key => $cat) {

        $totalItems = products_total_by_category($cat['id']);

        echo '<a href="index.php?c=shop&a=products_search&w=byCategoryId&txt=' . $cat['id'] . '" class="list-group-item">';
        echo '<span class="badge">' . $totalItems . '</span>';
        echo $cat['name'];
        echo '</a>';
    }
    ?>

    <a href="index.php?c=products&a=add" class="list-group-item"><?php _t("Add"); ?></a> 

</div>




