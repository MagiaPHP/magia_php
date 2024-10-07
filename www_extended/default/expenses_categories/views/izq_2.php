
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'expenses_categories'); ?>
        <?php echo _t("Expenses_categories"); ?>
    </a>
    <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("All"); ?></a>
    <a href="index.php?c=expenses_categories&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "expenses_categories"); ?>
        <?php echo _t("Categories"); ?>
    </a>
    <?php
    $icon[0] = '<span class="glyphicon glyphicon-folder-close"></span>';
    $icon[1] = '&nbsp; <span class="glyphicon glyphicon-menu-right"></span>';
    $icon[2] = '&nbsp; &nbsp; <span class="glyphicon glyphicon-menu-right"></span>';
    $icon[3] = '&nbsp; &nbsp; &nbsp; <span class="glyphicon glyphicon-menu-right"></span>';
    $icon[4] = '&nbsp; &nbsp; &nbsp; &nbsp; <span class="glyphicon glyphicon-menu-right"></span>';

    foreach (expenses_categories_without_father() as $child) {
        echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_id&father_id=' . $child['id'] . '" class="list-group-item">' . $icon[0] . ' ' . $child["category"] . '</a>';

        foreach (expenses_categories_childrens_of($child['code']) as $child) {
            echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_id&father_id=' . $child['id'] . '" class="list-group-item">' . $icon[1] . ' ' . $child["category"] . '</a>';

            foreach (expenses_categories_childrens_of($child['code']) as $child) {
                echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_id&father_id=' . $child['id'] . '" class="list-group-item">' . $icon[2] . ' ' . $child["category"] . '</a>';

                foreach (expenses_categories_childrens_of($child['code']) as $child) {
                    echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_id&father_id=' . $child['id'] . '" class="list-group-item">' . $icon[3] . ' ' . $child["category"] . '</a>';

                    foreach (expenses_categories_childrens_of($child['code']) as $child) {
                        echo '<a href="index.php?c=expenses_categories&a=search&w=by_father_id&father_id=' . $child['id'] . '" class="list-group-item">' . $icon[4] . ' ' . $child["category"] . '</a>';
                    }
                }
            }
        }
    }
    ?>
</div>









<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By description"); ?>
  </a>
  <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("List"); ?></a>

  <?php
  foreach (expenses_categories_unique_from_col("description") as $description) {
  if ($description['description'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("List"); ?></a>

  <?php
  foreach (expenses_categories_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "expenses_categories"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <a href="index.php?c=expenses_categories" class="list-group-item"><?php _t("List"); ?></a>

  <?php
  foreach (expenses_categories_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=expenses_categories&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>