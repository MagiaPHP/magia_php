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
# Fecha de creacion del documento: 2024-09-04 08:09:01 
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
        <?php _menu_icon("top" , 'doc_models_lines'); ?>
            <?php echo _t("Doc models lines"); ?>
    </a>
    <a href="index.php?c=doc_models_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "doc_models_lines", "create")) { ?>
        <a href="index.php?c=doc_models_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("modele") as $modele) {
        if ($modele['modele'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_modele&modele=' . $modele['modele'] . '" class="list-group-item">' . $modele['modele'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("doc") as $doc) {
        if ($doc['doc'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_doc&doc=' . $doc['doc'] . '" class="list-group-item">' . $doc['doc'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("section") as $section) {
        if ($section['section'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_section&section=' . $section['section'] . '" class="list-group-item">' . $section['section'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("element") as $element) {
        if ($element['element'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_element&element=' . $element['element'] . '" class="list-group-item">' . $element['element'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("params") as $params) {
        if ($params['params'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_params&params=' . $params['params'] . '" class="list-group-item">' . $params['params'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models_lines"); ?>
        <?php echo _t("By doc models lines"); ?>
    </a>
    <?php
    foreach (doc_models_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=doc_models_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

