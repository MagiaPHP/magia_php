<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-14 09:09:06 
#################################################################################
?>



<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

<script>
    function sellectAll(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] !== source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">               
            <?php
            // Obtener columnas a mostrar
            $user_cols_array = expenses_status_get_user_or_default_columns();
            // Mostrar las cabeceras de las columnas según la selección del usuario o las columnas por defecto
            foreach ($user_cols_array as $col) {
                // Verificar que la columna se debe mostrar
                if ($col["show"]) {
                    // Si la columna empieza con "button" o "modal", mostrar <th></th> vacío
                    if (strpos(strtolower($col["label"]), "button") === 0 || strpos(strtolower($col["label"]), "modal") === 0) {
                        echo "<th></th>";
                    } else {
                        // De lo contrario, mostrar el nombre de la columna
                        echo "<th>" . _tr(ucfirst($col["label"])) . "</th>";
                    }
                }
            }
            ?>
        </tr>
    </thead>
    <tfoot>
        <tr class="info">     
            <?php
            foreach ($user_cols_array as $col) {
                if ($col["show"]) {
                    // Si la columna empieza con "button" o "modal", mostrar <th></th> vacío
                    if (strpos(strtolower($col["label"]), "button") === 0 || strpos(strtolower($col["label"]), "modal") === 0) {
                        echo "<th></th>";
                    } else {
                        // De lo contrario, mostrar el nombre de la columna
                        echo "<th>" . _tr(ucfirst($col["label"])) . "</th>";
                    }
                }
            }
            ?>
        </tr>
    </tfoot>
    <tbody>
   




        <?php
        foreach ($expenses_status as $expenses_status_item) {

            $expenses_status_line = new Expenses_status();
            $expenses_status_line->setExpenses_status($expenses_status_item["id"]);

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("expenses_status", $expenses_status_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";

            echo "<tr>";

            // Mostrar los datos según las columnas seleccionadas por el usuario
            foreach ($user_cols_array as $col) {


                if ($col["show"]) {
                    $field = $col["col_name"];  // Nombre del campo a mostrar                    
                    // Dependiendo del campo, mostrar contenido personalizado   
                    
                    
                    switch ($field) {
                                         case 'id':
                        echo '<td><a href="index.php?c=expenses_status&a=details&id=' . $expenses_status_item['id'] . '">' . ($expenses_status_item['id']) . '</a></td>';
                        break;
                     case 'code':
                        echo '<td>' . ($expenses_status_item[$field]) . '</td>';
                        break;
                     case 'name':
                        echo '<td>' . ($expenses_status_item[$field]) . '</td>';
                        break;
                     case 'icon':
                        echo '<td>' . icon($expenses_status_item["icon"]) . '</td>'; // $yellow_pages_categories_item[$field]
                        break;
                     case 'color':
                        echo '<td>' . ($expenses_status_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($expenses_status_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($expenses_status_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($expenses_status_item["total"] + $expenses_status_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=details&id=' . $expenses_status_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=details_payement&id=' . $expenses_status_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=edit&id=' . $expenses_status_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("expenses_status", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=delete&id=' . $expenses_status_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("expenses_status", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=export_pdf&id=' . $expenses_status_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_status&a=export_pdf&way=pdf&&id=' . $expenses_status_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





