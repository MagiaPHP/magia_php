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
# Fecha de creacion del documento: 2024-10-01 09:10:44 
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
            $user_cols_array = order_by_get_user_or_default_columns("contacts");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "contacts", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "contacts", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($contacts as $contacts_item) {

            $contacts_line = new Contacts();
            $contacts_line->setContacts($contacts_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("contacts", $contacts_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($contacts_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $contacts_line->getDate();
                $month_actual = magia_dates_get_month_from_date($date);
            } else {
                $month_actual = null; // O cualquier valor predeterminado que quieras usar

            }
            


            // Mostrar separador de meses si cambia
            if (isset($month_actual) && $month_actual != $month) {
                $month = $month_actual;
                echo "<tr class='success'><td colspan='15'><b>" . _tr(magia_dates_month($month_actual)) . "</b></td></tr>";
            }
            
            
            echo "<tr>";

            // Mostrar los datos según las columnas seleccionadas por el usuario
            foreach ($user_cols_array as $col) {


                if ($col["show"]) {
                    $field = $col["col_name"];  // Nombre del campo a mostrar                    
                    // Dependiendo del campo, mostrar contenido personalizado   
                    
                    
                    switch ($field) {
                                         case 'id':
                        echo '<td><a href="index.php?c=contacts&a=details&id=' . $contacts_item['id'] . '">' . ($contacts_item['id']) . '</a></td>';
                        break;
                     case 'owner_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $owner_id = $contacts_line->getOwner_id() ?? null;

                            if ($owner_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($owner_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($owner_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'office_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $office_id = $contacts_line->getOffice_id() ?? null;

                            if ($office_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($office_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($office_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'type':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'title':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'name':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'lastname':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'description':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'birthdate':
                        echo '<td>' . magia_dates_formated($contacts_item[$field]) . '</td>';
                        break;
                     case 'tva':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'billing_method':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'discounts':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'language':
                        echo '<td>' . _languages_search_by_unique("name","language",  $contacts_item[$field]) . '</td>';
                        break;
                     case 'registre_date':
                        echo '<td>' . magia_dates_formated($contacts_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($contacts_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($contacts_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($contacts_item["total"] + $contacts_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=details&id=' . $contacts_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=details_payement&id=' . $contacts_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=edit&id=' . $contacts_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("contacts", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=delete&id=' . $contacts_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("contacts", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=export_pdf&id=' . $contacts_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=contacts&a=export_pdf&way=pdf&&id=' . $contacts_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





