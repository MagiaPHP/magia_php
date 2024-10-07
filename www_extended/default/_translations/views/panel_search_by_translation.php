<div class="panel panel-default">
    <div class="panel-heading"><?php _t('Search by translation'); ?></div>
    <div class="panel-body">


        <form action="index.php" method="get">
            <input type="hidden" name="c" value="_translations">
            <input type="hidden" name="a" value="search">
            <input type="hidden" name="w" value="byTranslation">

            <div class="form-group">
                <label for="txt"><?php _t("Text"); ?></label>
                <input type="text" name="txt" class="form-control" id="txt" placeholder="<?php _t("Traduction to find"); ?>">
            </div>


            <div class="form-group">
                <label for="language"><?php _t("Language"); ?></label>
                <select class="form-control" name="language" id="language">
                    <option value="all"><?php _t("All"); ?></option>
                    <?php
                    foreach (_languages_list() as $key => $value) {

                        $selected = ( $value['language'] == users_field_contact_id("language", $u_id) ) ? " selected " : "";

                        echo '<option value="' . $value['language'] . '" ' . $selected . '>' . _tr($value['name']) . '</option>';
                        //echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
                    }
                    ?>
                </select>
            </div>



            <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
        </form>

        <br>
        <a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>



    </div>
</div>



