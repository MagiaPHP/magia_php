
<?php
// Ejemplo de uso
$menu = new HelpMenu();
$menu->addItem('-a --ayuda', 'Same as `-h` `--help`');
$menu->addItem('-c --controllers', 'List of sections (controllers) where the system searches');
$menu->addItem('-h --help', 'Show you this page');
$menu->addItem('-l --logs', 'List of searches performed');
$menu->addItem('-s --sections', 'List of sections (controllers) where you have `read` permission');

// Generar y mostrar el menú
echo $menu->generateMenu();
?>