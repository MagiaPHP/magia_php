<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", "credit_notes"); ?>
        <?php echo _t("Search"); ?>
    </div>
    <div class="panel-body">
        <?php include "form_search_by_office.php"; ?>

        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>


    </div>
</div>
