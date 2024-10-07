<?php
//var_dump(json_decode($fle2->getM_options_values()), true);
//vardump($fle2->getM_options_values());
if (!$fle2->getM_options_values()) {
    $tab_db = ' active ';
    $tab_custom = '';
} else {
    $tab_db = '';
    $tab_custom = ' active ';
}
?>
<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="<?php echo $tab_db; ?>">
            <a href="#db" aria-controls="db" role="tab" data-toggle="tab">
                <?php _t("Data from DB"); ?>
            </a>
        </li>
        <li role="presentation" class="<?php echo $tab_custom; ?>">
            <a href="#custom" aria-controls="custom" role="tab" data-toggle="tab">
                <?php _t("Data custom"); ?>
            </a>
        </li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane <?php echo $tab_db; ?>" id="db">
            <br>
            <p><?php echo _t("To choose the options from the db, no custom options must be present"); ?></p>


            <?php
            echo "<br>";
            include "form_table_external.php";
            include "form_col_external.php";
            include "form_label_external.php";
            echo "<br>";
            ?>
        </div>
        <div role="tabpanel" class="tab-pane <?php echo $tab_custom; ?>" id="custom">
            <?php
            include "form_options_values.php";
            echo "<br>";
            ?>
        </div>
    </div>
</div>