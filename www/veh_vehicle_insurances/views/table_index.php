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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
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
            $user_cols_array = order_by_get_user_or_default_columns("veh_vehicle_insurances");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "veh_vehicle_insurances", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "veh_vehicle_insurances", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($veh_vehicle_insurances as $veh_vehicle_insurances_item) {

            $veh_vehicle_insurances_line = new Veh_vehicle_insurances();
            $veh_vehicle_insurances_line->setVeh_vehicle_insurances($veh_vehicle_insurances_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("veh_vehicle_insurances", $veh_vehicle_insurances_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($veh_vehicle_insurances_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $veh_vehicle_insurances_line->getDate();
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
                        echo '<td><a href="index.php?c=veh_vehicle_insurances&a=details&id=' . $veh_vehicle_insurances_item['id'] . '">' . ($veh_vehicle_insurances_item['id']) . '</a></td>';
                        break;
                     case 'vehicle_id':
                        echo '<td><a href="index.php?c=veh_vehicles&a=details&id=' . $veh_vehicle_insurances_item['vehicle_id'] . '">' . veh_vehicles_field_id("name", $veh_vehicle_insurances_item['vehicle_id'] ?? null) . '</a></td>';
                        break;
                     case 'insurance_code':
                        echo '<td>' . ($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'date_start':
                        echo '<td>' . magia_dates_formated($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'date_end':
                        echo '<td>' . magia_dates_formated($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'contrat_number':
                        echo '<td>' . ($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'countries_ok':
                        echo '<td>' . ($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($veh_vehicle_insurances_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($veh_vehicle_insurances_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($veh_vehicle_insurances_item["total"] + $veh_vehicle_insurances_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=details&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=details_payement&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=edit&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("veh_vehicle_insurances", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=delete&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("veh_vehicle_insurances", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=export_pdf&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_insurances&a=export_pdf&way=pdf&&id=' . $veh_vehicle_insurances_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





