
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains_plan'); ?>
        <?php echo _t("Subdomains_plan"); ?>
    </a>
    <a href="index.php?c=subdomains_plan" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=subdomains_plan&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan"); ?>
        <?php echo _t("By plan"); ?>
    </a>
    <?php
    foreach (subdomains_plan_unique_from_col("plan") as $plan) {
        if ($plan['plan'] != "") {
            echo '<a href="index.php?c=subdomains_plan&a=search&w=by_plan&plan=' . $plan['plan'] . '" class="list-group-item">' . $plan['plan'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan"); ?>
        <?php echo _t("By features"); ?>
    </a>
    <?php
    foreach (subdomains_plan_unique_from_col("features") as $features) {
        if ($features['features'] != "") {
            echo '<a href="index.php?c=subdomains_plan&a=search&w=by_features&features=' . $features['features'] . '" class="list-group-item">' . $features['features'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan"); ?>
        <?php echo _t("By price"); ?>
    </a>
    <?php
    foreach (subdomains_plan_unique_from_col("price") as $price) {
        if ($price['price'] != "") {
            echo '<a href="index.php?c=subdomains_plan&a=search&w=by_price&price=' . $price['price'] . '" class="list-group-item">' . $price['price'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (subdomains_plan_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=subdomains_plan&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "subdomains_plan"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (subdomains_plan_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=subdomains_plan&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

