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


    <div class="form-group">

        <?php
        /**
         * Si es multi tva, debo tener las oficionas 
         */
        if (IS_MULTI_VAT) {
            ?>
            <?php # office_id  ?>
            <select class="form-control" name="office_id" id="office_id">
                <option value="all"><?php _t("All offices"); ?></option>
                <?php
                foreach (offices_list_by_headoffice($u_owner_id) as $key => $office) { 
                    
                    $office_selected = (isset($office_id) && $office_id == $office['id'])?' selected ':""; 
                    
                    echo '<option value="' . $office['id'] . '" '.$office_selected.'>' . contacts_formated($office['id']) . '</option>';
                }
                ?>
            </select>
            <?php # /office_id   ?>
        <?php }
        ?>
    </div>

    <button 
        type="submit" 
        class="btn btn-default">
        <?php echo icon("search"); ?>
        <?php _t("Search"); ?>
    </button>
</form>