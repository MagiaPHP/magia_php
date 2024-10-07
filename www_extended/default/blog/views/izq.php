

<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php include view("panels", "panel_form_ok_show") ?>

<?php } ?>


<?php
// si tiene permiso de agregar blogs
if (permissions_has_permission($u_rol, 'blog', 'create')) {
    ?>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            <?php _menu_icon("top", 'blog'); ?>
            <?php echo _t("Blog"); ?>
        </a>
        <a href="index.php?c=blog" class="list-group-item"><?php _t("List"); ?></a>
        <?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>
            <a href="index.php?c=blog&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
        <?php } ?>    
    </div>
<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog"); ?>
        <?php echo _t("By controller"); ?>
    </a>
    <?php
    foreach (blog_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=blog&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog"); ?>
        <?php echo _t("By title"); ?>
    </a>
    <?php
    foreach (blog_list() as $bloglist) {
        echo '<a href="index.php?c=blog&a=details&&id=' . $bloglist['id'] . '" class="list-group-item">' . $bloglist['title'] . '</a>';
    }
    ?>
</div>




<?php
/**
 * 
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By title"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("title") as $title) {
  if ($title['title'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
  }
  }
  ?>
  </div>




 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By description"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("description") as $description) {
  if ($description['description'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By author_id"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("author_id") as $author_id) {
  if ($author_id['author_id'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_author_id&author_id=' . $author_id['author_id'] . '" class="list-group-item">' . $author_id['author_id'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By date"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("date") as $date) {
  if ($date['date'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "blog"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (blog_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=blog&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>