

<form action="index.php"  method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="search">


    <div class="form-group">
        <input 
            value="<?php echo (isset($txt)) ? $txt : ""; ?>"
            name="txt" 
            type="text" 
            class="form-control" 
            placeholder="" 
            autofocus
            required=""
            >
    </div>

    <div class="form-group">
        <select class="form-control" name="w">
            <option value="all"><?php _t("In all fields"); ?></option>
            <option value="tva" <?php echo (isset($w) && $w == 'tva') ? " selected " : ""; ?>><?php _t("Tva"); ?></option>
        </select>
    </div>


    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span> 
        <?php _t("Search"); ?>
    </button>

    <?php
    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////
    if (permissions_has_permission($u_rol, "contactssssss", "read")) {
        ?>                
        <a href="index.php?c=contacts&a=search_advanced" class="btn btn-default">
            <span class="glyphicon glyphicon-search"></span> 
            ...
        </a>
    <?php } ?>
</form>

