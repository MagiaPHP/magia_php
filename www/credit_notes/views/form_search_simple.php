<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input 
            autofocus=""
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
            required=""
            value="<?php echo (isset($txt)) ? $txt : ""; ?>"
            >
    </div>

    <button 
        type="submit" 
        class="btn btn-default">

        <span class="glyphicon glyphicon-search"></span>

        <?php _t("Search"); ?>
    </button>
</form>