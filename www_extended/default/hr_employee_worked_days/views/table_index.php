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
# Fecha de creacion del documento: 2024-09-16 19:09:59 
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

<table class="table table-striped table-condensed">


    <thead>
        <tr>
            <?php
            // Obtener columnas a mostrar
            $user_cols_array = order_by_get_user_or_default_columns("hr_employee_worked_days");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "hr_employee_worked_days", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "hr_employee_worked_days", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>





        <?php
        $month = null;
        $actual_date = null;

        foreach ($hr_employee_worked_days as $hr_employee_worked_days_item) {

            $hr_employee_worked_days_line = new Hr_employee_worked_days();
            $hr_employee_worked_days_line->setHr_employee_worked_days($hr_employee_worked_days_item["id"]);

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("hr_employee_worked_days", $hr_employee_worked_days_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";

            if (method_exists($hr_employee_worked_days_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $hr_employee_worked_days_line->getDate();
                $month_actual = magia_dates_get_month_from_date($date);
            } else {
                $month_actual = null; // O cualquier valor predeterminado que quieras usar
            }



            // Mostrar separador de meses si cambia
            if (isset($month_actual) && $month_actual != $month) {
                $month = $month_actual;
                echo "<tr class='success'><td colspan='15'><b>" . _tr(magia_dates_month($month_actual)) . "</b></td></tr>";
            }

            $next_date = $hr_employee_worked_days_line->getDate();

            echo '<tr>';
            if ($actual_date != $next_date) {
                $actual_date = $next_date;
                echo '<td colspan=' . count($user_cols_array) . '><b>' . magia_dates_formated($actual_date) . '</b></td>';
            }
            echo '</tr>';

            echo "<tr>";

            // Mostrar los datos según las columnas seleccionadas por el usuario
            foreach ($user_cols_array as $col) {


                if ($col["show"]) {
                    $field = $col["col_name"];  // Nombre del campo a mostrar                    
                    // Dependiendo del campo, mostrar contenido personalizado   


                    switch ($field) {
                        case 'id':
                            echo '<td><a href="index.php?c=hr_employee_worked_days&a=details&id=' . $hr_employee_worked_days_item['id'] . '">' . ($hr_employee_worked_days_item['id']) . '</a></td>';
                            break;
                        case 'employee_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $employee_id = $hr_employee_worked_days_line->getEmployee_id() ?? null;

                            if ($employee_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($employee_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($employee_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                        case 'date':
                            echo '<td>' . magia_dates_formated($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'start_am':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'end_am':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'lunch':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'start_pm':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'end_pm':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'total_hours':
                            echo '<td>' . hr_employee_worked_days_format_time($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'project_id':
                            echo '<td><a href="index.php?c=projects&a=details&id='.$hr_employee_worked_days_item[$field].'">' . projects_field_id("name", $hr_employee_worked_days_item[$field]) . '</a></td>';
                            break;
                        case 'notes':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'order_by':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;

                        case "status":
                            // Obtener el estado del gasto una vez y reutilizarlo
                            $status = $hr_employee_worked_days_item["status"];

                            // Obtener el ícono y el color del estado
                            $icon_status = ""; //icon(hr_employee_worked_days_status_field_code("icon", $status));
                            $color = ""; // hr_employee_worked_days_status_field_code("color", $status);
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
                            //echo '<td class="' . $class_status . '">' . $icon_status . ' ' . hr_employee_worked_days_status_field_code("name", $status) . '</td>';
                            echo '<td class="' . $class_status . '">' . $icon_status . ' ' . ($status) . '</td>';

                            break;

                        case 'year':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;
                        case 'month':
                            echo '<td>' . ($hr_employee_worked_days_item[$field]) . '</td>';
                            break;

                        //




                        case "total_plus_vat":
                            echo '<td  class="text-right">' . monedaf($hr_employee_worked_days_item["total"] + $hr_employee_worked_days_item["tax"]) . '</td>';
                            break;

                        case "button_details":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=details&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                            break;

                        case "button_pay":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=details_payement&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                            break;

                        case "button_edit":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=edit&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                            break;

                        case "modal_edit":
                            //                echo "<td>";
                            //                include view("hr_employee_worked_days", "modal_edit");
                            //                echo "</td>";
                            break;

                        case "button_delete":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=delete&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                            break;

                        case "modal_delete":
                            echo "<td>";
                            include view("hr_employee_worked_days", "modal_delete");
                            echo "</td>";
                            break;

                        case "button_print":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("print") . '</a></td>';
                            break;

                        case "button_save":
                            echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&way=pdf&&id=' . $hr_employee_worked_days_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                            break;
                    }
                }
            }

            echo "</tr>";
        }
        ?>
    </tbody>
</table>





