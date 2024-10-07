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
# Fecha de creacion del documento: 2024-09-27 12:09:05 
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
        <?php _menu_icon("top" , 'blog_comments'); ?>
            <?php echo _t("Blog comments"); ?>
    </a>
    <a href="index.php?c=blog_comments" class="list-group-item"><?php _t("List"); ?></a>
        
    <?php if (permissions_has_permission($u_rol, "blog_comments", "create")) { ?>
        <a href="index.php?c=blog_comments&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>    

</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("blog_id") as $blog_id) {
        if ($blog_id['blog_id'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_blog_id&blog_id=' . $blog_id['blog_id'] . '" class="list-group-item">' . $blog_id['blog_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("title") as $title) {
        if ($title['title'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_title&title=' . $title['title'] . '" class="list-group-item">' . $title['title'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("comment") as $comment) {
        if ($comment['comment'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_comment&comment=' . $comment['comment'] . '" class="list-group-item">' . $comment['comment'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("author_id") as $author_id) {
        if ($author_id['author_id'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_author_id&author_id=' . $author_id['author_id'] . '" class="list-group-item">' . $author_id['author_id'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("date") as $date) {
        if ($date['date'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_date&date=' . $date['date'] . '" class="list-group-item">' . $date['date'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("order_by") as $order_by) {
        if ($order_by['order_by'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_order_by&order_by=' . $order_by['order_by'] . '" class="list-group-item">' . $order_by['order_by'] . '</a>';
        }
    }
    ?>
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "blog_comments"); ?>
        <?php echo _t("By blog comments"); ?>
    </a>
    <?php
    foreach (blog_comments_unique_from_col("status") as $status) {
        if ($status['status'] != "") {
            echo '<a href="index.php?c=blog_comments&a=search&w=by_status&status=' . $status['status'] . '" class="list-group-item">' . $status['status'] . '</a>';
        }
    }
    ?>
</div>

