
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains_plan_features'); ?>
        <?php echo _t("Subdomains_plan_features"); ?>
    </a>
    <a href="index.php?c=subdomains_plan_features" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=subdomains_plan_features&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan_features"); ?>
        <?php echo _t("By plan"); ?>
    </a>
    <?php
    foreach (subdomains_plan_features_unique_from_col("plan") as $plan) {
        if ($plan['plan'] != "") {
            echo '<a href="index.php?c=subdomains_plan_features&a=search&w=by_plan&plan=' . $plan['plan'] . '" class="list-group-item">' . $plan['plan'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan_features"); ?>
        <?php echo _t("By feature"); ?>
    </a>
    <?php
    foreach (subdomains_plan_features_unique_from_col("feature") as $feature) {
        if ($feature['feature'] != "") {
            echo '<a href="index.php?c=subdomains_plan_features&a=search&w=by_feature&feature=' . $feature['feature'] . '" class="list-group-item">' . $feature['feature'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan_features"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (subdomains_plan_features_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=subdomains_plan_features&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan_features"); ?>
        <?php echo _t("By stattus"); ?>
    </a>
    <?php
    foreach (subdomains_plan_features_unique_from_col("stattus") as $stattus) {
        if ($stattus['stattus'] != "") {
            echo '<a href="index.php?c=subdomains_plan_features&a=search&w=by_stattus&stattus=' . $stattus['stattus'] . '" class="list-group-item">' . $stattus['stattus'] . '</a>';
        }
    }
    ?>
</div>

