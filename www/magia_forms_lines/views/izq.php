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
# Fecha de creacion del documento: 2024-08-31 17:08:35 
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
        <?php _menu_icon("top" , 'magia_forms_lines'); ?>
            <?php echo _t("Magia_forms_lines"); ?>
    </a>
    <a href="index.php?c=magia_forms_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "magia_forms_lines", "create")) { ?>
        <a href="index.php?c=magia_forms_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_form_id"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_form_id") as $mg_form_id) {
        if ($mg_form_id['mg_form_id'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_form_id&mg_form_id=' . $mg_form_id['mg_form_id'] . '" class="list-group-item">' . $mg_form_id['mg_form_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_type"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_type") as $mg_type) {
        if ($mg_type['mg_type'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_type&mg_type=' . $mg_type['mg_type'] . '" class="list-group-item">' . $mg_type['mg_type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_external_table"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_external_table") as $mg_external_table) {
        if ($mg_external_table['mg_external_table'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_external_table&mg_external_table=' . $mg_external_table['mg_external_table'] . '" class="list-group-item">' . $mg_external_table['mg_external_table'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_external_col"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_external_col") as $mg_external_col) {
        if ($mg_external_col['mg_external_col'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_external_col&mg_external_col=' . $mg_external_col['mg_external_col'] . '" class="list-group-item">' . $mg_external_col['mg_external_col'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_label"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_label") as $mg_label) {
        if ($mg_label['mg_label'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_label&mg_label=' . $mg_label['mg_label'] . '" class="list-group-item">' . $mg_label['mg_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_help_text"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_help_text") as $mg_help_text) {
        if ($mg_help_text['mg_help_text'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_help_text&mg_help_text=' . $mg_help_text['mg_help_text'] . '" class="list-group-item">' . $mg_help_text['mg_help_text'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_name"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_name") as $mg_name) {
        if ($mg_name['mg_name'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_name&mg_name=' . $mg_name['mg_name'] . '" class="list-group-item">' . $mg_name['mg_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_id"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_id") as $mg_id) {
        if ($mg_id['mg_id'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_id&mg_id=' . $mg_id['mg_id'] . '" class="list-group-item">' . $mg_id['mg_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_placeholder"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_placeholder") as $mg_placeholder) {
        if ($mg_placeholder['mg_placeholder'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_placeholder&mg_placeholder=' . $mg_placeholder['mg_placeholder'] . '" class="list-group-item">' . $mg_placeholder['mg_placeholder'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_value"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_value") as $mg_value) {
        if ($mg_value['mg_value'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_value&mg_value=' . $mg_value['mg_value'] . '" class="list-group-item">' . $mg_value['mg_value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_class"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_class") as $mg_class) {
        if ($mg_class['mg_class'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_class&mg_class=' . $mg_class['mg_class'] . '" class="list-group-item">' . $mg_class['mg_class'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_required"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_required") as $mg_required) {
        if ($mg_required['mg_required'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_required&mg_required=' . $mg_required['mg_required'] . '" class="list-group-item">' . $mg_required['mg_required'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By mg_disabled"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("mg_disabled") as $mg_disabled) {
        if ($mg_disabled['mg_disabled'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_mg_disabled&mg_disabled=' . $mg_disabled['mg_disabled'] . '" class="list-group-item">' . $mg_disabled['mg_disabled'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_forms_lines"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (magia_forms_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=magia_forms_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

