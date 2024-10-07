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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
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
        <?php _menu_icon("top" , 'campos'); ?>
            <?php echo _t("Campos"); ?>
    </a>
    <a href="index.php?c=campos" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "campos", "create")) { ?>
        <a href="index.php?c=campos&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("base_datos") as $base_datos) {
        if ($base_datos['base_datos'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_base_datos&base_datos=' . $base_datos['base_datos'] . '" class="list-group-item">' . $base_datos['base_datos'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("tabla") as $tabla) {
        if ($tabla['tabla'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_tabla&tabla=' . $tabla['tabla'] . '" class="list-group-item">' . $tabla['tabla'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("campo") as $campo) {
        if ($campo['campo'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_campo&campo=' . $campo['campo'] . '" class="list-group-item">' . $campo['campo'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("accion") as $accion) {
        if ($accion['accion'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_accion&accion=' . $accion['accion'] . '" class="list-group-item">' . $accion['accion'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("label") as $label) {
        if ($label['label'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_label&label=' . $label['label'] . '" class="list-group-item">' . $label['label'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("tipo") as $tipo) {
        if ($tipo['tipo'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_tipo&tipo=' . $tipo['tipo'] . '" class="list-group-item">' . $tipo['tipo'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("clase") as $clase) {
        if ($clase['clase'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_clase&clase=' . $clase['clase'] . '" class="list-group-item">' . $clase['clase'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("nombre") as $nombre) {
        if ($nombre['nombre'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_nombre&nombre=' . $nombre['nombre'] . '" class="list-group-item">' . $nombre['nombre'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("identificador") as $identificador) {
        if ($identificador['identificador'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_identificador&identificador=' . $identificador['identificador'] . '" class="list-group-item">' . $identificador['identificador'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("marca_agua") as $marca_agua) {
        if ($marca_agua['marca_agua'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_marca_agua&marca_agua=' . $marca_agua['marca_agua'] . '" class="list-group-item">' . $marca_agua['marca_agua'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("valor") as $valor) {
        if ($valor['valor'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_valor&valor=' . $valor['valor'] . '" class="list-group-item">' . $valor['valor'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("solo_lectura") as $solo_lectura) {
        if ($solo_lectura['solo_lectura'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_solo_lectura&solo_lectura=' . $solo_lectura['solo_lectura'] . '" class="list-group-item">' . $solo_lectura['solo_lectura'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("obligatorio") as $obligatorio) {
        if ($obligatorio['obligatorio'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_obligatorio&obligatorio=' . $obligatorio['obligatorio'] . '" class="list-group-item">' . $obligatorio['obligatorio'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("seleccionado") as $seleccionado) {
        if ($seleccionado['seleccionado'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_seleccionado&seleccionado=' . $seleccionado['seleccionado'] . '" class="list-group-item">' . $seleccionado['seleccionado'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("desactivado") as $desactivado) {
        if ($desactivado['desactivado'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_desactivado&desactivado=' . $desactivado['desactivado'] . '" class="list-group-item">' . $desactivado['desactivado'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("orden") as $orden) {
        if ($orden['orden'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_orden&orden=' . $orden['orden'] . '" class="list-group-item">' . $orden['orden'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "campos"); ?>
        <?php echo _t("By campos"); ?>
    </a>
    <?php
    foreach (campos_unique_from_col("estatus") as $estatus) {
        if ($estatus['estatus'] != "") {
            echo '<a href="index.php?c=campos&a=search&w=by_estatus&estatus=' . $estatus['estatus'] . '" class="list-group-item">' . $estatus['estatus'] . '</a>';
        }
    }
    ?>
</div>

