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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
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
            $user_cols_array = order_by_get_user_or_default_columns("hr_employee_family_dependents");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "hr_employee_family_dependents", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "hr_employee_family_dependents", $order_data["col_name"], $order_data["order_way"]);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($hr_employee_family_dependents as $hr_employee_family_dependents_item) {

            $hr_employee_family_dependents_line = new Hr_employee_family_dependents();
            $hr_employee_family_dependents_line->setHr_employee_family_dependents($hr_employee_family_dependents_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("hr_employee_family_dependents", $hr_employee_family_dependents_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($hr_employee_family_dependents_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $hr_employee_family_dependents_line->getDate();
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
                        echo '<td><a href="index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents_item['id'] . '">' . ($hr_employee_family_dependents_item['id']) . '</a></td>';
                        break;
                     case 'employee_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $employee_id = $hr_employee_family_dependents_line->getEmployee_id() ?? null;

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
                     case 'name':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'lastname':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'birthday':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'relation':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'in_charge':

                        $is_hr_employee_family_dependents_in_charge  = ($hr_employee_family_dependents_item["in_charge"])? _tr("Yes") : _tr("No") ;
                        echo '<td>' . $is_hr_employee_family_dependents_in_charge . '</td>';                            
                        break;
                     case 'handicap':

                        $is_hr_employee_family_dependents_handicap  = ($hr_employee_family_dependents_item["handicap"])? _tr("Yes") : _tr("No") ;
                        echo '<td>' . $is_hr_employee_family_dependents_handicap . '</td>';                            
                        break;
                     case 'notes':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($hr_employee_family_dependents_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($hr_employee_family_dependents_item["total"] + $hr_employee_family_dependents_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=details_payement&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=edit&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("hr_employee_family_dependents", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=delete&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("hr_employee_family_dependents", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&way=pdf&&id=' . $hr_employee_family_dependents_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





