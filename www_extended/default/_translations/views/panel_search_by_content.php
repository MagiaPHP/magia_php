
<div class="panel panel-default">
    <div class="panel-heading"><?php _t('Search by content'); ?></div>
    <div class="panel-body">

        <form action="index.php" method="get">
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="byContent">

            <div class="form-group">
                <label for="txt"><?php _t("Text original"); ?></label>
                <input
                    type="text"
                    name="txt"
                    class="form-control"
                    id="txt"
                    placeholder="<?php _t("Text original to find"); ?>">
            </div>
            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>

        <br>
        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>

    </div>
</div>

