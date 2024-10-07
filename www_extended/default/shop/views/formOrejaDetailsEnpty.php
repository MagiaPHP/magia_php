<?php
switch ($s) {
    case 'L':
        $side = 'Left';
        break;
    case 'R':
        $side = 'Right';
        break;
    case 'L':
        $side = 'Stereo';
        break;

    default:
        break;
}
?>
<div class="panel panel-default">
    <div class="panel-heading"><b><?php _t("Ear"); ?>: <?php _t($side); ?></b></div>
    <div class="panel-body">


        <?php _t('No items'); ?>

    </div>
</div>




