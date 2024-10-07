<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("To fix"); ?></div>
    <div class="panel-body">

        <p><?php _t("To fix"); ?></p>
        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_translations">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="toFix">

            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>

        <br>

        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>



    </div>
</div>

