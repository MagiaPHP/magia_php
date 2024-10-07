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
# Fecha de creacion del documento: 2024-08-31 17:08:05 
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
        <?php _menu_icon("top" , 'magia_table_lines'); ?>
            <?php echo _t("Magia_table_lines"); ?>
    </a>
    <a href="index.php?c=magia_table_lines" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "magia_table_lines", "create")) { ?>
        <a href="index.php?c=magia_table_lines&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By table_id"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("table_id") as $table_id) {
        if ($table_id['table_id'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_table_id&table_id=' . $table_id['table_id'] . '" class="list-group-item">' . $table_id['table_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By header_icon"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("header_icon") as $header_icon) {
        if ($header_icon['header_icon'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_header_icon&header_icon=' . $header_icon['header_icon'] . '" class="list-group-item">' . $header_icon['header_icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By header_pre_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("header_pre_label") as $header_pre_label) {
        if ($header_pre_label['header_pre_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_header_pre_label&header_pre_label=' . $header_pre_label['header_pre_label'] . '" class="list-group-item">' . $header_pre_label['header_pre_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By header_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("header_label") as $header_label) {
        if ($header_label['header_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_header_label&header_label=' . $header_label['header_label'] . '" class="list-group-item">' . $header_label['header_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By header_url"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("header_url") as $header_url) {
        if ($header_url['header_url'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_header_url&header_url=' . $header_url['header_url'] . '" class="list-group-item">' . $header_url['header_url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By header_post_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("header_post_label") as $header_post_label) {
        if ($header_post_label['header_post_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_header_post_label&header_post_label=' . $header_post_label['header_post_label'] . '" class="list-group-item">' . $header_post_label['header_post_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By body_icon"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("body_icon") as $body_icon) {
        if ($body_icon['body_icon'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_body_icon&body_icon=' . $body_icon['body_icon'] . '" class="list-group-item">' . $body_icon['body_icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By body_pre_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("body_pre_label") as $body_pre_label) {
        if ($body_pre_label['body_pre_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_body_pre_label&body_pre_label=' . $body_pre_label['body_pre_label'] . '" class="list-group-item">' . $body_pre_label['body_pre_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By body_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("body_label") as $body_label) {
        if ($body_label['body_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_body_label&body_label=' . $body_label['body_label'] . '" class="list-group-item">' . $body_label['body_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By body_post_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("body_post_label") as $body_post_label) {
        if ($body_post_label['body_post_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_body_post_label&body_post_label=' . $body_post_label['body_post_label'] . '" class="list-group-item">' . $body_post_label['body_post_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By footer_icon"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("footer_icon") as $footer_icon) {
        if ($footer_icon['footer_icon'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_footer_icon&footer_icon=' . $footer_icon['footer_icon'] . '" class="list-group-item">' . $footer_icon['footer_icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By footer_pre_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("footer_pre_label") as $footer_pre_label) {
        if ($footer_pre_label['footer_pre_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_footer_pre_label&footer_pre_label=' . $footer_pre_label['footer_pre_label'] . '" class="list-group-item">' . $footer_pre_label['footer_pre_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By footer_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("footer_label") as $footer_label) {
        if ($footer_label['footer_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_footer_label&footer_label=' . $footer_label['footer_label'] . '" class="list-group-item">' . $footer_label['footer_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By footer_post_label"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("footer_post_label") as $footer_post_label) {
        if ($footer_post_label['footer_post_label'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_footer_post_label&footer_post_label=' . $footer_post_label['footer_post_label'] . '" class="list-group-item">' . $footer_post_label['footer_post_label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By description"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By permission"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("permission") as $permission) {
        if ($permission['permission'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_permission&permission=' . $permission['permission'] . '" class="list-group-item">' . $permission['permission'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By align"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("align") as $align) {
        if ($align['align'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_align&align=' . $align['align'] . '" class="list-group-item">' . $align['align'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By show"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("show") as $show) {
        if ($show['show'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_show&show=' . $show['show'] . '" class="list-group-item">' . $show['show'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By translate"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("translate") as $translate) {
        if ($translate['translate'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_translate&translate=' . $translate['translate'] . '" class="list-group-item">' . $translate['translate'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By order_by"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "magia_table_lines"); ?>
        <?php echo _t("By status"); ?>
    </a>
    <?php
    foreach (magia_table_lines_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=magia_table_lines&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

