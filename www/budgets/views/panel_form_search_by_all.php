<div class="panel panel-default">
    <div class="panel-heading">


        <?php _menu_icon("top", "budgets"); ?>
        <?php echo _t("Search by all"); ?>        
    </div>
    <div class="panel-body">

        <?php include "form_search_by_all.php"; ?>


        <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
            <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>
        <?php } ?>


    </div>
</div>
