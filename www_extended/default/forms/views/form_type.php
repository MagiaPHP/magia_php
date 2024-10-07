<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Type"); ?>
    </div>
    <div class="panel-body">

        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="forms_lines">
            <input type="hidden" name="a" value="ok_push_field">
            <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">
            <input type="hidden" name="field" value="m_type">
            <input type="hidden" name="redi" value="2">

            <div class="form-group">
                <label class="sr-only" for="new_data"><?php _t("m_type"); ?></label>
                <select class="form-control" name="new_data">
                    <?php
                    $types = array(
                        "hidden" => "Hidden",
                        "text" => "Text",
                        "email" => "E-mail",
                        "date" => "Date",
                        "textarea" => "Textarea",
                        "select" => "Select",
                        "radio" => "Radio",
                        "check" => "Check",
                        "submit" => "Submit",
                    );

                    foreach ($types as $key => $type) {

                        $selected = ($key == $fle2->getM_type()) ? " selected " : "";

                        echo '<option value="' . $key . '" ' . $selected . '>' . _tr($type) . '</option>';
                    }
                    ?>

                </select>
            </div>
            <button type="submit" class="btn btn-default">
                <?php _t("Type"); ?>
            </button>
        </form>
    </div>
</div>