<?php

class HelpMenu {

    // Propiedad para almacenar los ítems del menú
    private $items = [];

    // Constructor opcional para agregar ítems iniciales
    public function __construct($items = []) {
        $this->items = $items;
    }

    // Método para agregar un ítem al menú
    public function addItem($command, $description) {
        $this->items[] = [
            'command' => $command,
            'description' => $description
        ];
    }

    // Método para generar el menú HTML
    public function generateMenu() {
        $html = '<div class="well">';
        $html .= '<h3>' . $this->translate("Help") . '</h3>';
        $html .= '<ul>';

        foreach ($this->items as $item) {
            $html .= '<li>';
            $html .= '<b>' . $item['command'] . '</b>';
            $html .= '<p>' . $this->translate($item['description']) . '</p>';
            $html .= '</li>';
        }

        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }

    // Método para manejar la traducción
    private function translate($text) {
        // Asume que _t() es una función global para traducir
        return _tr($text);
    }
}

//// Ejemplo de uso
//$menu = new HelpMenu();
//$menu->addItem('-a --ayuda', 'Same as `-h` `--help`');
//$menu->addItem('-c --controllers', 'List of sections (controllers) where the system searches');
//$menu->addItem('-h --help', 'Show you this page');
//$menu->addItem('-l --logs', 'List of searches performed');
//$menu->addItem('-s --sections', 'List of sections (controllers) where you have `read` permission');
//
//// Generar y mostrar el menú
//echo $menu->generateMenu();
?>
