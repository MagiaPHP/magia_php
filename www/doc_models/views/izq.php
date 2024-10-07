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
# Fecha de creacion del documento: 2024-09-04 08:09:56 
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
        <?php _menu_icon("top" , 'doc_models'); ?>
            <?php echo _t("Doc models"); ?>
    </a>
    <a href="index.php?c=doc_models" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "doc_models", "create")) { ?>
        <a href="index.php?c=doc_models&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("name") as $name) {
        if ($name['name'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_name&name=' . $name['name'] . '" class="list-group-item">' . $name['name'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("description") as $description) {
        if ($description['description'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_description&description=' . $description['description'] . '" class="list-group-item">' . $description['description'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("params") as $params) {
        if ($params['params'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_params&params=' . $params['params'] . '" class="list-group-item">' . $params['params'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("author") as $author) {
        if ($author['author'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_author&author=' . $author['author'] . '" class="list-group-item">' . $author['author'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("author_email") as $author_email) {
        if ($author_email['author_email'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_author_email&author_email=' . $author_email['author_email'] . '" class="list-group-item">' . $author_email['author_email'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("url") as $url) {
        if ($url['url'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_url&url=' . $url['url'] . '" class="list-group-item">' . $url['url'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("version") as $version) {
        if ($version['version'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_version&version=' . $version['version'] . '" class="list-group-item">' . $version['version'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "doc_models"); ?>
        <?php echo _t("By doc models"); ?>
    </a>
    <?php
    foreach (doc_models_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=doc_models&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

