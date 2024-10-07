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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
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
            $user_cols_array = order_by_get_user_or_default_columns("veh_maintenance");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "veh_maintenance", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "veh_maintenance", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($veh_maintenance as $veh_maintenance_item) {

            $veh_maintenance_line = new Veh_maintenance();
            $veh_maintenance_line->setVeh_maintenance($veh_maintenance_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("veh_maintenance", $veh_maintenance_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($veh_maintenance_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $veh_maintenance_line->getDate();
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
                        echo '<td><a href="index.php?c=veh_maintenance&a=details&id=' . $veh_maintenance_item['id'] . '">' . ($veh_maintenance_item['id']) . '</a></td>';
                        break;
                     case 'vehicle_id':
                        echo '<td><a href="index.php?c=veh_vehicles&a=details&id=' . $veh_maintenance_item['vehicle_id'] . '">' . veh_vehicles_field_id("name", $veh_maintenance_item['vehicle_id'] ?? null) . '</a></td>';
                        break;
                     case 'workshop_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $workshop_id = $veh_maintenance_line->getWorkshop_id() ?? null;

                            if ($workshop_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($workshop_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($workshop_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'date':
                        echo '<td>' . magia_dates_formated($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'type':
                        echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'next_visit':
                        echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'total':
                        echo '<td  class="text-right">' . moneda($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'kl':
                        echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'notes':
                        echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'date_registre':
                        echo '<td>' . magia_dates_formated($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($veh_maintenance_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($veh_maintenance_item["total"] + $veh_maintenance_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=details&id=' . $veh_maintenance_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=details_payement&id=' . $veh_maintenance_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=edit&id=' . $veh_maintenance_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("veh_maintenance", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=delete&id=' . $veh_maintenance_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("veh_maintenance", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=export_pdf&id=' . $veh_maintenance_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=export_pdf&way=pdf&&id=' . $veh_maintenance_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





