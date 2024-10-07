<form class="form-inline" method="get" action="index.php">
    <input type="hidden" name="c" value="public_html">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="global">



    <div class="form-group">
        <label class="sr-only" for="txt">w</label>
        <input type="text" name="txt" class="form-control" id="txt" placeholder="<?php _t("What are you looking for?"); ?>">
    </div>

    <div class="form-group">
        <label class="sr-only" for="when"><?php _t("When"); ?></label>
        <select class="form-control" name="when">
            <option value="0"><?php _t("Today"); ?></option>
            <option value="1"><?php _t("Tomorrow"); ?></option>
            <option value="7"><?php _t("Next 7 days"); ?></option>
            <option value="15"><?php _t("Next 15 days"); ?></option>
            <option value="30"><?php _t("Next month"); ?></option>
            <option value="all"><?php _t("Allways"); ?></option>
        </select>                             
    </div>

    <div class="form-group">
        <label class="sr-only" for="province"><?php _t("Province"); ?></label>
        <select class="form-control" name="province">
            <?php
            foreach (country_provinces_list_by_country($config_country) as $key => $province) {

                $selected = ($province['province'] == $config_province) ? " selected " : "";

                echo '<option value="' . ($province['province']) . '" ' . $selected . '>' . $province['province'] . '</option>';
            }
            ?>

        </select>    
    </div>




    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        <?php _t("Search"); ?></button>
</form>