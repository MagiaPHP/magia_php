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
# Fecha de creacion del documento: 2024-09-21 12:09:46 
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
        <?php _menu_icon("top" , 'hr_benefits'); ?>
            <?php echo _t("Hr benefits"); ?>
    </a>
    <a href="index.php?c=hr_benefits" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "hr_benefits", "create")) { ?>
        <a href="index.php?c=hr_benefits&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("value") as $value) {
        if ($value['value'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_value&value=' . $value['value'] . '" class="list-group-item">' . $value['value'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("icon") as $icon) {
        if ($icon['icon'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_icon&icon=' . $icon['icon'] . '" class="list-group-item">' . $icon['icon'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "hr_benefits"); ?>
        <?php echo _t("By hr benefits"); ?>
    </a>
    <?php
    foreach (hr_benefits_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=hr_benefits&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

