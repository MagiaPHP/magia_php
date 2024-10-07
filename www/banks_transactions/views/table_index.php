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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
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
            $user_cols_array = order_by_get_user_or_default_columns("banks_transactions");

            //vardump($user_cols_array); 
            // Renderizar encabezados con iconos de ordenación
            order_by_render_table_headers_with_icons($user_cols_array, "banks_transactions", $order_col, $order_way);
            ?>
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <?php
            // Renderizar pie de tabla con las mismas columnas e iconos
            order_by_render_table_headers_with_icons($user_cols_array, "banks_transactions", $order_col, $order_way);
            ?>
        </tr>
    </tfoot>



    <tbody>
   




        <?php
        
        $month = null;

        foreach ($banks_transactions as $banks_transactions_item) {

            $banks_transactions_line = new Banks_transactions();
            $banks_transactions_line->setBanks_transactions($banks_transactions_item["id"]);
                

            // Verificar si tiene comentarios
            $has_comments = (comments_total_by_controller_id("banks_transactions", $banks_transactions_line->getId())) ? true : false;
            // Icono de comentarios
            $comment_icon = ($has_comments && modules_field_module("status", "comments") && permissions_has_permission($u_rol, "comments", "read")) ? icon("comment") : "";


            
            
            if (method_exists($banks_transactions_line, "getDate")) {
                // Llamar al método getDate() si existe
                $date = $banks_transactions_line->getDate();
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
                        echo '<td><a href="index.php?c=banks_transactions&a=details&id=' . $banks_transactions_item['id'] . '">' . ($banks_transactions_item['id']) . '</a></td>';
                        break;
                     case 'client_id':
                            // Obtener id de oficina, si no existe se asigna null
                            $client_id = $banks_transactions_line->getClient_id() ?? null;

                            if ($client_id !== null) {
                                // Obtener el nombre formateado del contacto
                                $formatted_contact = contacts_formated($client_id);
                                // Mostrar enlace a los detalles del contacto con el ID escapado para HTML
                                echo '<td><a href="index.php?c=contacts&a=details&id=' . htmlspecialchars($client_id, ENT_QUOTES, "UTF-8") . '">' . $formatted_contact . '</a></td>';
                            } else {
                                // Mostrar mensaje por defecto si no hay información
                                echo "<td>" . _tr("No data") . "</td>";
                            }
                            break;
                     case 'document':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'document_id':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'type':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'account_number':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'total':
                        echo '<td  class="text-right">' . moneda($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'operation_number':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'date':
                        echo '<td>' . magia_dates_formated($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'ref':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'description':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'ce':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'details':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'message':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'currency':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'code':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'registre_date':
                        echo '<td>' . magia_dates_formated($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'created_date':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'updated_date':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'canceled_code':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'order_by':
                        echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                        break;
                     case 'status':
                            echo '<td>' . ($banks_transactions_item[$field]) . '</td>';
                            break;

                    //
                    
                   
                                            
                    
                    case "total_plus_vat":
                        echo '<td  class="text-right">' . monedaf($banks_transactions_item["total"] + $banks_transactions_item["tax"]) . '</td>';
                        break;
                                            
                    case "button_details":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=details&id=' . $banks_transactions_item['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                        break;

                    case "button_pay":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=details_payement&id=' . $banks_transactions_item['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                        break;

                    case "button_edit":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=edit&id=' . $banks_transactions_item['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                        break;

                    case "modal_edit":
    //                echo "<td>";
    //                include view("banks_transactions", "modal_edit");
    //                echo "</td>";
                        break;

                    case "button_delete":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=delete&id=' . $banks_transactions_item['id'] . '">' . icon("trash") . ' ' . _tr('Delete') . '</a></td>';
                        break;

                    case "modal_delete":
                        echo "<td>";
                        include view("banks_transactions", "modal_delete");
                        echo "</td>";
                        break;

                    case "button_print":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=export_pdf&id=' . $banks_transactions_item['id'] . '">' . icon("print") . '</a></td>';
                        break;

                    case "button_save":
                        echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=export_pdf&way=pdf&&id=' . $banks_transactions_item['id'] . '">' . icon("floppy-save") . '</a></td > ';
                        break;

                    }
                }
            }   
            
            echo "</tr>";
        }
        ?>
    </tbody>
</table>





