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
# Fecha de creacion del documento: 2024-09-18 06:09:37 
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
        <?php _menu_icon("top" , 'cv_languages'); ?>
            <?php echo _t("Cv languages"); ?>
    </a>
    <a href="index.php?c=cv_languages" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "cv_languages", "create")) { ?>
        <a href="index.php?c=cv_languages&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_languages"); ?>
        <?php echo _t("By cv languages"); ?>
    </a>
    <?php
    foreach (cv_languages_unique_from_col("cv_id") as $cv_id) {
        if ($cv_id['cv_id'] != "") {
            echo '<a href="index.php?c=cv_languages&a=search&w=by_cv_id&cv_id=' . $cv_id['cv_id'] . '" class="list-group-item">' . $cv_id['cv_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_languages"); ?>
        <?php echo _t("By cv languages"); ?>
    </a>
    <?php
    foreach (cv_languages_unique_from_col("language") as $language) {
        if ($language['language'] != "") {
            echo '<a href="index.php?c=cv_languages&a=search&w=by_language&language=' . $language['language'] . '" class="list-group-item">' . $language['language'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_languages"); ?>
        <?php echo _t("By cv languages"); ?>
    </a>
    <?php
    foreach (cv_languages_unique_from_col("level") as $level) {
        if ($level['level'] != "") {
            echo '<a href="index.php?c=cv_languages&a=search&w=by_level&level=' . $level['level'] . '" class="list-group-item">' . $level['level'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_languages"); ?>
        <?php echo _t("By cv languages"); ?>
    </a>
    <?php
    foreach (cv_languages_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=cv_languages&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "cv_languages"); ?>
        <?php echo _t("By cv languages"); ?>
    </a>
    <?php
    foreach (cv_languages_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=cv_languages&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

