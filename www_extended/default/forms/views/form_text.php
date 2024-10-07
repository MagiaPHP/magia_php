<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">

    <div class="form-group">
        <label for="label"><?php _t("Label"); ?></label>
        <input type="text" name="m_label" class="form-control" id="label" placeholder="">
    </div>


    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text" name="m_name" class="form-control" id="name" placeholder="">
    </div>


    <div class="form-group">
        <label for="placeholder"><?php _t("Placeholder"); ?></label>
        <input type="text" name="m_placeholder" class="form-control" id="placeholder" placeholder="">
    </div>

    <div class="form-group">
        <label for="value"><?php _t("Value"); ?></label>
        <input type="text" name="m_value" class="form-control" id="value" placeholder="">
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="m_mandatory" value="1"> <?php _t('Is mandatory'); ?>
        </label>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" name="m_disabled" value="1"> <?php _t('Disabled'); ?>
        </label>
    </div>


    <button type="submit" class="btn btn-default">Submit</button>
</form>