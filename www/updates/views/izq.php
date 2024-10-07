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
# Fecha de creacion del documento: 2024-09-23 09:09:43 
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
        <?php _menu_icon("top" , 'updates'); ?>
            <?php echo _t("Updates"); ?>
    </a>
    <a href="index.php?c=updates" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "updates", "create")) { ?>
        <a href="index.php?c=updates&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code") as $code) {
        if ($code['code'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code&code=' . $code['code'] . '" class="list-group-item">' . $code['code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("controller") as $controller) {
        if ($controller['controller'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_controller&controller=' . $controller['controller'] . '" class="list-group-item">' . $controller['controller'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("version") as $version) {
        if ($version['version'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_version&version=' . $version['version'] . '" class="list-group-item">' . $version['version'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_install") as $code_install) {
        if ($code_install['code_install'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_install&code_install=' . $code_install['code_install'] . '" class="list-group-item">' . $code_install['code_install'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_uninstall") as $code_uninstall) {
        if ($code_uninstall['code_uninstall'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_uninstall&code_uninstall=' . $code_uninstall['code_uninstall'] . '" class="list-group-item">' . $code_uninstall['code_uninstall'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("code_check") as $code_check) {
        if ($code_check['code_check'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_code_check&code_check=' . $code_check['code_check'] . '" class="list-group-item">' . $code_check['code_check'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("installed") as $installed) {
        if ($installed['installed'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_installed&installed=' . $installed['installed'] . '" class="list-group-item">' . $installed['installed'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("pass") as $pass) {
        if ($pass['pass'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_pass&pass=' . $pass['pass'] . '" class="list-group-item">' . $pass['pass'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "updates"); ?>
        <?php echo _t("By updates"); ?>
    </a>
    <?php
    foreach (updates_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=updates&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

