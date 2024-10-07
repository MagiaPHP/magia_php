
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'docu'); ?>
        <?php echo _t("Docu"); ?>
    </a>
    <a href="index.php?c=docu" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=docu&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By controllers"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("controllers") as $controllers) {
        if ($controllers['controllers'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_controllers&controllers=' . $controllers['controllers'] . '" class="list-group-item">' . $controllers['controllers'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By action"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("action") as $action) {
        if ($action['action'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_action&action=' . $action['action'] . '" class="list-group-item">' . $action['action'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By language"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("language") as $language) {
        if ($language['language'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_language&language=' . $language['language'] . '" class="list-group-item">' . $language['language'] . '</a>';
        }
    }
    ?>
</div>

<?php
/**
 * 
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "docu"); ?>
  <?php echo _t("By father_id"); ?>
  </a>
  <?php
  foreach (docu_unique_from_col("father_id") as $father_id) {
  if ($father_id['father_id'] != "") {
  echo '<a href="index.php?c=docu&a=search&w=by_father_id&father_id=' . $father_id['father_id'] . '" class="list-group-item">' . $father_id['father_id'] . '</a>';
  }
  }
  ?>
  </div>
 */
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By title"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<?php
/**
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "docu"); ?>
  <?php echo _t("By post"); ?>
  </a>
  <?php
  foreach (docu_unique_from_col("post") as $post) {
  if ($post['post'] != "") {
  echo '<a href="index.php?c=docu&a=search&w=by_post&post=' . $post['post'] . '" class="list-group-item">' . $post['post'] . '</a>';
  }
  }
  ?>
  </div>


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "docu"); ?>
  <?php echo _t("By h"); ?>
  </a>
  <?php
  foreach (docu_unique_from_col("h") as $h) {
  if ($h['h'] != "") {
  echo '<a href="index.php?c=docu&a=search&w=by_h&h=' . $h['h'] . '" class="list-group-item">' . $h['h'] . '</a>';
  }
  }
  ?>
  </div>



 */
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (docu_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=docu&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

