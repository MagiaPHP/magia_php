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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
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



<div class="shadow-container">

    <table class="table table-striped table-condensed">
  

    <thead>
        <tr class="">
            <?php
            // Obtener columnas a mostrar
            $user_cols_array = order_by_get_user_or_default_columns("expenses");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "expenses", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "expenses", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($expenses as $expenses_item) {

            $expenses_line = new Expenses();
            $expenses_line->setExpenses($expenses_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("expenses", $expenses_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($expenses_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $expenses_line->getDate();
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
                        echo '<td><a href="index.php?c=expenses&a=details&id=' . $expenses_item['id'] . '">' . ($expenses_item['id']) . '</a></td>';
                        break;
                     case 'office_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $office_id = $expenses_line->getOffice_id() ?? null;

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
                     case 'office_id_counter_year_month':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'office_id_counter_year_trimestre':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'office_id_counter':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'my_ref':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'father_id':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                      case "category_code":
                        echo '<td>' . expenses_categories_field_code("category", $expenses_item["category_code"]) . '</td>';   
                        break;
                     case 'invoice_number':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'budget_id':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'credit_note_id':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'provider_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $provider_id = $expenses_line->getProvider_id() ?? null;

                            if ($provider_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($provider_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($provider_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'seller_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $seller_id = $expenses_line->getSeller_id() ?? null;

                            if ($seller_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($seller_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($seller_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'clon_from_id':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'title':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'addresses_billing':
                            echo "<td>" . addresses_formated_html($expenses['addresses_billing'] ?? '' ) . "</td>";
                            break;
                     case 'addresses_delivery':
                            echo "<td>" . addresses_formated_html($expenses['addresses_delivery'] ?? '' ) . "</td>";
                            break;
                     case 'date':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'date_registre':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'deadline':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'total':
                        echo '<td  class="text-right">' . moneda($expenses_item[$field]) . '</td>';
                        break;
                     case 'tax':
                        echo '<td  class="text-right">' . moneda($expenses_item[$field]) . '</td>';
                        break;
                     case 'advance':
                        echo '<td  class="text-right">' . moneda($expenses_item[$field]) . '</td>';
                        break;
                     case 'balance':
                        echo '<td  class="text-right">' . moneda($expenses_item[$field]) . '</td>';
                        break;
                     case 'comments':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'comments_private':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'r1':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'r2':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'r3':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'fc':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'date_update':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'days':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'ce':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'type':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'every':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'times':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case 'date_start':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'date_end':
                        echo '<td>' . magia_dates_formated($expenses_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($expenses_item[$field]) . '</td>';
                        break;
                     case "status":
                            // Obtener el estado del gasto una vez y reutilizarlo
                            // $bdd_referencias = Array
                            $status = $expenses_item["status"];

                            // Obtener el ícono y el color del estado
                            $icon_status = icon(expenses_status_field_code("icon", $status));
                            $color = expenses_status_field_code("color", $status);

                            // Mapeo directo de colores a clases de estado
                            $class_status_map = [
                                "active" => "active",
                                "success" => "success",
                                "warning" => "warning",
                                "danger" => "danger",
                                "info" => "info"
                            ];

                            // Asignar clase de estado o una cadena vacía si no hay coincidencia
                            $class_status = isset($class_status_map[$color]) ? $class_status_map[$color] : "";

                            // Mostrar la celda con el ícono, el nombre del estado y la clase de color correspondiente
                            echo '<td class="' . $class_status . '">' . $icon_status . ' ' . expenses_status_field_code("name", $status) . '</td>';

                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($expenses_item["total"] + $expenses_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=details&id=' . $expenses_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=details_payement&id=' . $expenses_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=edit&id=' . $expenses_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("expenses", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=delete&id=' . $expenses_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("expenses", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=export_pdf&id=' . $expenses_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=export_pdf&way=pdf&&id=' . $expenses_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>


</div>

<br>
<br>


