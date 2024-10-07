
<?php if (is_logued() && $c != 'g' && modules_field_module('status', 'g') && $c != 'shop') { ?>

    <?php include view('g', 'form_global_search') ?>

<?php } ?>