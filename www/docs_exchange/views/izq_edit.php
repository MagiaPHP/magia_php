
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , 'docs_exchange'); ?>
            <?php echo _t("Docs_exchange"); ?>
    </a>
    <a href="index.php?c=docs_exchange" class="list-group-item"><?php _t("List"); ?></a>
     
<?php if (permissions_has_permission($u_rol, "docs_exchange", "create")) { ?>
        <a href="index.php?c=docs_exchange&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
    <?php } ?>
    
</div>