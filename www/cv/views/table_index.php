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
# Fecha de creacion del documento: 2024-09-18 07:09:41 
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
            $user_cols_array = order_by_get_user_or_default_columns("cv");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "cv", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "cv", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($cv as $cv_item) {

            $cv_line = new Cv();
            $cv_line->setCv($cv_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("cv", $cv_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($cv_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $cv_line->getDate();
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
                        echo '<td><a href="index.php?c=cv&a=details&id=' . $cv_item['id'] . '">' . ($cv_item['id']) . '</a></td>';
                        break;
                     case 'first_name':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'last_name':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'address':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'city':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'postal_code':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'phone_number':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'email':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'driver_license':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'birth_date':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'availability':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'professional_goal':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'summary':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'hobbies':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'created_at':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'work_experience':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'education':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'technologies':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'skills':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'projects':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'languages':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($cv_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($cv_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($cv_item["total"] + $cv_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=details&id=' . $cv_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=details_payement&id=' . $cv_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=edit&id=' . $cv_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("cv", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=delete&id=' . $cv_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("cv", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=export_pdf&id=' . $cv_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=export_pdf&way=pdf&&id=' . $cv_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





