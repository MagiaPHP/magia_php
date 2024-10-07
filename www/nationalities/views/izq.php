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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
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
        <?php _menu_icon("top" , 'nationalities'); ?>
            <?php echo _t("Nationalities"); ?>
    </a>
    <a href="index.php?c=nationalities" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "nationalities", "create")) { ?>
        <a href="index.php?c=nationalities&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("num_code") as $num_code) {
        if ($num_code['num_code'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_num_code&num_code=' . $num_code['num_code'] . '" class="list-group-item">' . $num_code['num_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("alpha_2_code") as $alpha_2_code) {
        if ($alpha_2_code['alpha_2_code'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_alpha_2_code&alpha_2_code=' . $alpha_2_code['alpha_2_code'] . '" class="list-group-item">' . $alpha_2_code['alpha_2_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("alpha_3_code") as $alpha_3_code) {
        if ($alpha_3_code['alpha_3_code'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_alpha_3_code&alpha_3_code=' . $alpha_3_code['alpha_3_code'] . '" class="list-group-item">' . $alpha_3_code['alpha_3_code'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("en_short_name") as $en_short_name) {
        if ($en_short_name['en_short_name'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_en_short_name&en_short_name=' . $en_short_name['en_short_name'] . '" class="list-group-item">' . $en_short_name['en_short_name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("nationality") as $nationality) {
        if ($nationality['nationality'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_nationality&nationality=' . $nationality['nationality'] . '" class="list-group-item">' . $nationality['nationality'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "nationalities"); ?>
        <?php echo _t("By nationalities"); ?>
    </a>
    <?php
    foreach (nationalities_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=nationalities&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

