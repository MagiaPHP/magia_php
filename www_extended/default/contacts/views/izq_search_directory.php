<div class="panel panel-default">
    <div class="panel-heading">Panel heading without title</div>
    <div class="panel-body">

        <form method="get" action="index.php">
            <input type="hidden" name="c" value="contacts"> 
            <input type="hidden" name="a" value="ok_search_directory"> 

            <div class="form-group">
                <label for="txt"><?php _t("Company name"); ?></label>
                <input name="txt" type="txt" class="form-control" id="txt" placeholder="">
            </div>



            <button type="submit" class="btn btn-default">
                <?php _t("Search"); ?>
            </button>
        </form>




    </div>
</div>