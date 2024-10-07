<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="search">




    <div class="form-group">


        <select name="year" class="form-control">
            <?php /* <option value="0" <?php echo (!$year)? " selected ":""; ?>><?php _t("All columns"); ?></option> */ ?>
            <?php
            $selected = "";
            for ($i = 2021; $i < date('Y') + 1; $i++) {

                if (date('Y') == $i) {
                    $selected = " selected ";
                }
                echo '<option value="' . $i . '" ' . $selected . ' >' . $i . '</option>';
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