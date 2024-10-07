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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
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
        <?php _menu_icon("top" , 'veh_vehicles'); ?>
            <?php echo _t("Veh vehicles"); ?>
    </a>
    <a href="index.php?c=veh_vehicles" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "veh_vehicles", "create")) { ?>
        <a href="index.php?c=veh_vehicles&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("marca") as $marca) {
        if ($marca['marca'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_marca&marca=' . $marca['marca'] . '" class="list-group-item">' . $marca['marca'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("modelo") as $modelo) {
        if ($modelo['modelo'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_modelo&modelo=' . $modelo['modelo'] . '" class="list-group-item">' . $modelo['modelo'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("serie") as $serie) {
        if ($serie['serie'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_serie&serie=' . $serie['serie'] . '" class="list-group-item">' . $serie['serie'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("type") as $type) {
        if ($type['type'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_type&type=' . $type['type'] . '" class="list-group-item">' . $type['type'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("pasangers") as $pasangers) {
        if ($pasangers['pasangers'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_pasangers&pasangers=' . $pasangers['pasangers'] . '" class="list-group-item">' . $pasangers['pasangers'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("year") as $year) {
        if ($year['year'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_year&year=' . $year['year'] . '" class="list-group-item">' . $year['year'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("chasis") as $chasis) {
        if ($chasis['chasis'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_chasis&chasis=' . $chasis['chasis'] . '" class="list-group-item">' . $chasis['chasis'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("color") as $color) {
        if ($color['color'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_color&color=' . $color['color'] . '" class="list-group-item">' . $color['color'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("alto") as $alto) {
        if ($alto['alto'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_alto&alto=' . $alto['alto'] . '" class="list-group-item">' . $alto['alto'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("ancho") as $ancho) {
        if ($ancho['ancho'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_ancho&ancho=' . $ancho['ancho'] . '" class="list-group-item">' . $ancho['ancho'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("largo") as $largo) {
        if ($largo['largo'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_largo&largo=' . $largo['largo'] . '" class="list-group-item">' . $largo['largo'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("date_buy") as $date_buy) {
        if ($date_buy['date_buy'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_date_buy&date_buy=' . $date_buy['date_buy'] . '" class="list-group-item">' . $date_buy['date_buy'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("mma") as $mma) {
        if ($mma['mma'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_mma&mma=' . $mma['mma'] . '" class="list-group-item">' . $mma['mma'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("towing_system") as $towing_system) {
        if ($towing_system['towing_system'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_towing_system&towing_system=' . $towing_system['towing_system'] . '" class="list-group-item">' . $towing_system['towing_system'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("towing_system_kl") as $towing_system_kl) {
        if ($towing_system_kl['towing_system_kl'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_towing_system_kl&towing_system_kl=' . $towing_system_kl['towing_system_kl'] . '" class="list-group-item">' . $towing_system_kl['towing_system_kl'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("date_registre") as $date_registre) {
        if ($date_registre['date_registre'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_date_registre&date_registre=' . $date_registre['date_registre'] . '" class="list-group-item">' . $date_registre['date_registre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "veh_vehicles"); ?>
        <?php echo _t("By veh vehicles"); ?>
    </a>
    <?php
    foreach (veh_vehicles_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=veh_vehicles&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

