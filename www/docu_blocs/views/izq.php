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
# Fecha de creacion del documento: 2024-09-22 18:09:53 
#################################################################################
?>

                
<?php
foreach (panels_search_controller_action_status($c, "index", 1) as $key => $pscas) {
    $panel = new Panels();
    $panel->setPanels($pscas["id"]);
    include $panel->getPanel() . ".php";
}
?>
<?php if (permissions_has_permission($u_rol, "config", "update") && modules_field_module("status", "panels")) { ?>

    <?php  include view("panels", "panel_form_ok_show") ?>

<?php } ?>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'docu_blocs'); ?>
            <?php echo _t("Docu blocs"); ?>
    </a>
    <a href="index.php?c=docu_blocs" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "docu_blocs", "create")) { ?>
        <a href="index.php?c=docu_blocs&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("docu_id") as $docu_id) {
        if ($docu_id['docu_id'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_docu_id&docu_id=' . $docu_id['docu_id'] . '" class="list-group-item">' . $docu_id['docu_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("bloc") as $bloc) {
        if ($bloc['bloc'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_bloc&bloc=' . $bloc['bloc'] . '" class="list-group-item">' . $bloc['bloc'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("post") as $post) {
        if ($post['post'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_post&post=' . $post['post'] . '" class="list-group-item">' . $post['post'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("h") as $h) {
        if ($h['h'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_h&h=' . $h['h'] . '" class="list-group-item">' . $h['h'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "docu_blocs"); ?>
        <?php echo _t("By docu blocs"); ?>
    </a>
    <?php
    foreach (docu_blocs_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=docu_blocs&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

