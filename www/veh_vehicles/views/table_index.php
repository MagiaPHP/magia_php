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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
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
            $user_cols_array = order_by_get_user_or_default_columns("veh_vehicles");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "veh_vehicles", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "veh_vehicles", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($veh_vehicles as $veh_vehicles_item) {

            $veh_vehicles_line = new Veh_vehicles();
            $veh_vehicles_line->setVeh_vehicles($veh_vehicles_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("veh_vehicles", $veh_vehicles_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($veh_vehicles_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $veh_vehicles_line->getDate();
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
                        echo '<td><a href="index.php?c=veh_vehicles&a=details&id=' . $veh_vehicles_item['id'] . '">' . ($veh_vehicles_item['id']) . '</a></td>';
                        break;
                     case 'name':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'marca':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'modelo':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'serie':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'type':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'pasangers':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'year':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'chasis':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'color':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'alto':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'ancho':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'largo':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'date_buy':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'mma':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'towing_system':

                        $is_veh_vehicles_towing_system  = ($veh_vehicles_item["towing_system"])? _tr("Yes") : _tr("No") ;
                        echo '<td>' . $is_veh_vehicles_towing_system . '</td>';                            
                        break;
                     case 'towing_system_kl':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'date_registre':
                        echo '<td>' . magia_dates_formated($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($veh_vehicles_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($veh_vehicles_item["total"] + $veh_vehicles_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=details&id=' . $veh_vehicles_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=details_payement&id=' . $veh_vehicles_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=edit&id=' . $veh_vehicles_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("veh_vehicles", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=delete&id=' . $veh_vehicles_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("veh_vehicles", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=export_pdf&id=' . $veh_vehicles_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=export_pdf&way=pdf&&id=' . $veh_vehicles_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





