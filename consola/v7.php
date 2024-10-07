<?php

// Menú principal
while (true) {
    echo "\nSeleccione una opción:\n";
    echo "1) Crear un nuevo plugin\n";
    echo "2) Eliminar un plugin existente\n";
    echo "3) Verificar presencia de ítems de un plugin\n";
    echo "4) Agregar un campo a la tabla\n";
    echo "5) Crear plugins por prefijo\n";
    echo "6) Crear un archivo de view, controller o model para una tabla\n";
    echo "0) Salir\n";

    $opcion = trim(fgets(STDIN));

    switch ($opcion) {
        case '1':
            // Lógica para crear un nuevo plugin
            break;
        case '2':
            // Lógica para eliminar un plugin existente
            break;
        case '3':
            // Lógica para verificar ítems de un plugin
            break;
        case '4':
            // Lógica para agregar un campo a la tabla
            break;
        case '5':
            // Lógica para crear plugins por prefijo
            break;
        case '6':
            // Lógica para crear un archivo de view, controller o model
            break;
        case '7':
            
            

            
            
            
        case '0':
            echo "Saliendo...\n";
            exit();
        default:
            echo "Opción no válida.\n";
    }
}

?>
