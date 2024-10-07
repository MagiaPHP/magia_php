<a name="75"></a>

<div class="panel panel-default">
    <div class="panel-body">
        <h3>
            <?php _t("Comunication extrucure"); ?>
        </h3>




        <form class="" action="index.php" method="post" >
            <input type="hidden" name="c" value="expenses">
            <input type="hidden" name="a" value="ok_add_75">
            <input type="hidden" name="redi" value="1">

            <div class="form-group">
                <label for="ce" class="sr-only"><?php _t("ce"); ?></label>
                <input type="text" class="form-control" name="ce" autofocus="">
            </div>



            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>





        </form>



    </div>
</div>

