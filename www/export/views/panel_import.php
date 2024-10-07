<?php
if (!modules_field_module('status', 'import')) {
    if ($c == 'export' && permissions_has_permission($u_rol, 'import', "read")) {
        include view('import', "izq");
    }
}
?>
<a href="index.php?c=panels&a=ok_hidden&id=<?php echo $panel->getId(); ?>&redi=1"><?php echo icon("eye-close"); ?></a>
