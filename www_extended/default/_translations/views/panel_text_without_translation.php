<div class="panel panel-primary">
    <div class="panel-heading"><?php _t("Text without translation"); ?></div>
    <div class="panel-body">

        <p><?php _t("Find texts without translation"); ?></p>

        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_content">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="hasNotTranslation">

            <div class="form-group">
                <label for="language"><?php _t("Language"); ?></label>
                <select class="form-control" name="language" id="language">

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

