
<div class="panel panel-default">
    <div class="panel-heading">

        <?php _t('Search'); ?>
    </div>
    <div class="panel-body">


        <form method="get" action="index.php">
            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="all">



            <div class="form-group">
                <label for="name"><?php _t("Contact"); ?></label>
                <input 
                    type="text" 
                    class="form-control" 
                    name="txt" id="txt" placeholder="">
            </div>

            <button type="submit" class="btn btn-default">
                <?php _t("Search"); ?>
            </button>

        </form>

        <br>

        <?php if (permissions_has_permission($u_rol, 'config', 'update')) { ?>
            <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>
        <?php } ?>


    </div>
</div>


