<?php
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-30 20:08:27 
#################################################################################
?>


<div class="list-group">
    <a href="#" class="list-group-item disabled">
        Cras justo odio
    </a>
    <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
    <a href="#" class="list-group-item">Morbi leo risus</a>




    <?php if (permissions_has_permission($u_rol, "config", "create")) { ?>
        <a href="#"  class="list-group-item" data-toggle="modal" data-target="#addMenuItemsIzq"><?php echo icon("plus"); ?> <?php _t("Add items"); ?></a>
        <div class="modal fade" id="addMenuItemsIzq" tabindex="-1" role="dialog" aria-labelledby="addMenuItemsIzqLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="addMenuItemsIzqLabel">
                            <?php _t("Add menu"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $location = $c . '_izq';

                        include view("_menus", "form_add_item");
                        ?>
                    </div>


                    <div class="modal-footer">
                        <a href="index.php?c=_menus" type="button" class="btn btn-danger"><?php _t("Edit items"); ?></a>                        
                    </div>


                </div>
            </div>
        </div>
    <?php } ?>


</div>















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
/**
 * <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", 'yellow_pages'); ?>
  <?php echo _t("Yellow_pages"); ?>
  </a>
  <a href="index.php?c=yellow_pages" class="list-group-item"><?php _t("List"); ?></a>

  <?php if (permissions_has_permission($u_rol, "yellow_pages", "create")) { ?>
  <a href="index.php?c=yellow_pages&a=add" class="list-group-item">
  <?php echo icon("plus"); ?>
  <?php _t("Add"); ?>
  </a>
  <?php } ?>

  </div>

 */
?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php echo _t("Categories"); ?>
    </a>

    <a href="index.php?c=yellow_pages" class="list-group-item">
        <?php _menu_icon("top", "yellow_pages"); ?>
        <?php _t("All"); ?>
    </a> 


    <?php
    foreach (yellow_pages_categories_list(0, 999, 'category', 'ASC') as $ypcl) {

        echo '<a href="index.php?c=yellow_pages&a=search&w=by_category&category=' . $ypcl['category'] . '" class="list-group-item">' . icon($ypcl['icon']) . ' ' . _tr($ypcl['category']) . '</a>';
    }
    ?>

    <?php
    if (permissions_has_permission($u_rol, "yellow_pages_categories", "create")) {
        ?>


        <a href="#" class="list-group-item" data-toggle="modal" data-target="#addCategory">
            <?php echo icon("plus"); ?>
            <?php _t("Add category"); ?>
        </a> 

        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" 
                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="addCategoryLabel">
                            <?php _t("Add categories"); ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $arg['redi'] = '5';
                        $arg['c'] = 'yellow_pages';
                        $arg['a'] = 'index';

                        include view('yellow_pages_categories', 'form_add');
                        ?>
                    </div>


                </div>
            </div>
        </div>



    <?php } ?>    

    <?php if (permissions_has_permission($u_rol, "yellow_pages_categories", "update")) { ?>
        <a href="index.php?c=yellow_pages_categories" class="list-group-item">
            <?php echo icon("pencil"); ?>
            <?php _t("Edit category"); ?>
        </a> 
    <?php } ?>    


</div>



<?php
/**
 * 


  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By label"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("label") as $label) {
  if ($label['label'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
  }
  }
  ?>
  </div>





  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By url"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("url") as $url) {
  if ($url['url'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By description"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("description") as $description) {
  if ($description['description'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By category"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("category") as $category) {
  if ($category['category'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_category&category=' . $category['category'] . '" class="list-group-item">' . $category['category'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By target"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("target") as $target) {
  if ($target['target'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_target&target=' . $target['target'] . '" class="list-group-item">' . $target['target'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By order_by"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("order_by") as $order_by) {
  if ($order_by['order_by'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
  }
  }
  ?>
  </div>

  <div class="list-group">
  <a href="#" class="list-group-item active">
  <?php _menu_icon("top", "yellow_pages"); ?>
  <?php echo _t("By status"); ?>
  </a>
  <?php
  foreach (yellow_pages_unique_from_col("status") as $status) {
  if ($status['status'] != "") {
  echo '<a href="index.php?c=yellow_pages&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
  }
  }
  ?>
  </div>


 */
?>