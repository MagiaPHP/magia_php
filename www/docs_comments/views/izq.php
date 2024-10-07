
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'docs_comments'); ?>
        <?php echo _t("Docs_comments"); ?>
    </a>
    <a href="index.php?c=docs_comments" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=docs_comments&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>



<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'docs_comments'); ?>
        <?php echo _t("By controller"); ?>
    </a>

    <a href="index.php?c=docs_comments" class="list-group-item"><?php _t("All"); ?></a>

    <?php
    foreach (docs_comments_list_controllers() as $key => $controller) {
        echo '<a href="index.php?c=docs_comments&a=search&w=by_controller&controller=' . ($controller['controller']) . '" class="list-group-item">' . _tr($controller['controller']) . '</a>';
    }
    ?>
</div>