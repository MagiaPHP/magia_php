<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <select name="year" class="form-control">
            <option value="0"><?php echo _t("All"); ?></option>            
            <?php
            $year_selected = '';

            for ($i = invoices_min_year(); $i <= invoices_max_year(); $i++) {

                $year_selected = ($i == date('Y')) ? ' selected ' : '';

                echo '<option value="' . $i . '" ' . $year_selected . ' >' . $i . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <input 
            autofocus=""
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
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