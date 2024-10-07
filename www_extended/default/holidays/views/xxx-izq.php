

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "conddddddddddddfig", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'holidays'); ?>
        <?php echo _t("Holidays"); ?>
    </a>
    <a href="index.php?c=holidays" class="list-group-item"><?php _t("List"); ?></a>
    <?php if (permissions_has_permission($u_rol, "holidays", "create")) { ?>
        <a href="index.php?c=holidays&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "holidays"); ?>
        <?php echo _t("By country"); ?>
    </a>
    <?php
    foreach (holidays_unique_from_col("country") as $country) {
        if ($country['country'] != "") {
            echo '<a href="index.php?c=holidays&a=search&w=by_country&country=' . $country['country'] . '" class="list-group-item">' . _tr(countries_field_country_code('countryName', $country['country'])) . '</a>';
        }
    }
    ?>
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "holidays"); ?>
        <?php echo _t("By category"); ?>
    </a>
    <?php
    foreach (holidays_categories_list() as $category) {

        $holidays_categories_icon = ($category['icon']) ? icon($category['icon']) : '';

        if ($category['code'] != "") {
            echo '<a href="index.php?c=holidays&a=search&w=by_category_code&category_code=' . $category['code'] . '" class="list-group-item">' . $holidays_categories_icon . ' ' . holidays_categories_field_code('category', $category['code']) . '</a>';
        }
    }
    ?>

    <a href="index.php?c=holidays_categories" class="list-group-item">
        <?php echo icon('wrench'); ?> <?php _t("Config"); ?>
    </a> 

</div>


