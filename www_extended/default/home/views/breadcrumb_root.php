<?php
// Verificamos si la variable $breadcrumb ya está definida
if (!isset($breadcrumb)) {
    // Si no está definida, inicializamos como un array vacío para evitar el warning
    $breadcrumb = array();
}

// Definir el breadcrumb con un número ilimitado de elementos
//$breadcrumb = array(
//    array("label" => "Home", "url" => "index.php"),
//    array("label" => "Products", "url" => "products.php"),
//    array("label" => "Electronics", "url" => "electronics.php"),
//    array("label" => "Televisions", "url" => "televisions.php"),
//    array("label" => "Samsung", "url" => "samsung.php"),
//        // Puedes seguir agregando más enlaces según sea necesario
//);
// Función para renderizar el breadcrumb
function render_breadcrumb($breadcrumb = null) {

    global $c, $a;

    if (!empty($breadcrumb)) {
        echo '<ol class="breadcrumb">';

        // Recorre el array del breadcrumb sin límites
        foreach ($breadcrumb as $key => $link) {
            // Verifica si es el último elemento del breadcrumb
            if ($key === array_key_last($breadcrumb)) {
                // El último ítem es el actual (activo), no es un enlace
                echo '<li class="active">' . htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8') . '</li>';
            } else {
                // Los ítems previos son enlaces
                echo '<li><a href="' . htmlspecialchars($link['url'], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($link['label'], ENT_QUOTES, 'UTF-8') . '</a></li>';
            }
        }

        echo '</ol>';
    } else {
        // Breadcrumb por defecto si el array está vacío
        ?>
        <ol class="breadcrumb">
            <li><a href="index.php"><?php _t("Home"); ?></a></li>
            <!-- Aquí podrías agregar lógica adicional para los breadcrumbs por defecto -->
            <?php if ($c != "docu" && $c != 'docu_blocs') { ?>
                <li><a href="index.php?c=<?php echo "$c"; ?>"><?php echo _tr($c); ?></a></li>
                <?php echo ( isset($a) && $a != "index" ) ? '<li class="active">' . _tr(($a)) . '</li>' : ''; ?>
                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal($c, $a);
                }
                ?>
                <?php
            }
            ?>
        </ol>
        <?php
    }
}







// Llamar a la función para renderizar el breadcrumb

render_breadcrumb($breadcrumb);
?>




<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'ul_index');
}
?>











