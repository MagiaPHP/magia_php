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
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
        }
    }
</script>


<div class="shadow-container">

    <table class="table table-striped table-condensed">

        <thead>
            <tr>
                <td></td>
                <?php
                // Obtener columnas a mostrar
                $user_cols_array = order_by_get_user_or_default_columns('credit_notes');

                //vardump($user_cols_array); 
                // Renderizar encabezados con iconos de ordenación
                order_by_render_table_headers_with_icons($user_cols_array, 'credit_notes', $order_data['col_name'], $order_data['order_way']);
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <td></td>
                <?php
                // Renderizar pie de tabla con las mismas columnas e iconos
                order_by_render_table_headers_with_icons($user_cols_array, 'credit_notes', $order_data['col_name'], $order_data['order_way']);
                ?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>



        <tbody>
            <?php
            $sumaTotal = 0;
            $sumaTax = 0;
            $month_actual = null;
            $month = null;

            foreach ($credit_notes as $credit_note) {
                
                $cn = new Credit_notes($credit_note['id']);

                // Verificar si tiene comentarios
                $has_comments = (comments_total_by_controller_id("credit_notes", $cn->getId())) ? true : false;

                $comment_icon = (
                        $has_comments &&
                        modules_field_module('status', 'comments') &&
                        permissions_has_permission($u_rol, "comments", "read")
                        ) ? "<span class='glyphicon glyphicon-comment'></span>" : "";

                // Actualizar las sumas totales
                $sumaTotal += $credit_note['total'];

                $sumaTax += $credit_note['tax'];

                $month_actual = magia_dates_get_month_from_date($credit_note['date']);
                $year_actual = magia_dates_get_year_from_date($credit_note['date']);

                // Mostrar separador de meses si cambia
                if ($month_actual != $month) {
                    $month = $month_actual;
                    echo "<tr class='success'><td colspan='19'><b>" . _tr(magia_dates_month($month_actual)) . " - " . $year_actual . "</b></td></tr>";
                }
                //
                //
                //
                //
                //
                echo "<tr>";
                // Checkbox para seleccionar la nota de crédito
                echo "<td><input name='credit_notes_id[]' type='checkbox' value='" . $cn->getId() . "'></td>";

                // Mostrar los datos según las columnas seleccionadas por el usuario
                foreach ($user_cols_array as $col) {
                    if ($col['show']) {
                        $field = $col['col_name'];  // Nombre del campo a mostrar                    
                        // Dependiendo del campo, mostrar contenido personalizado                                        
                        switch ($field) {
                            case 'id':
                                echo "<td><a href='index.php?c=credit_notes&a=details&id=" . $credit_note['id'] . "'>" . $credit_note['id'] . " " . $comment_icon . "</a></td>";
                                break;

                            case 'id_formatted':
                                echo "<td>" . $cn->getId_formatted() . "</td>";
                                break;

                            case 'office_id':
                            case 'client_id':
                                echo "<td><a href='index.php?c=contacts&a=details&id=" . $credit_note[$field] . "'>" . contacts_formated($credit_note[$field]) . "</a></td>";
                                break;

                            case 'invoice_id':
                                echo "<td><a href='index.php?c=invoices&a=details&id=" . $credit_note['invoice_id'] . "'>" . invoices_numberf($credit_note['invoice_id']) . "</a></td>";
                                break;

                            case 'addresses_billing':
                                echo "<td>" . addresses_formated_html($credit_note['addresses_billing']) . "</td>";
                                break;

                            case 'addresses_delivery':
                                echo "<td>" . addresses_formated_html($credit_note['addresses_billing']) . "</td>";
                                break;

                            case 'date':
                            case 'date_registre':
                                echo "<td>" . magia_dates_formated($credit_note[$field]) . "</td>";
                                break;

                            case 'total':
                                echo "<td class='text-right'>" . moneda($credit_note['total']) . "</td>";
                                break;

                            case 'tax':
                                echo "<td class='text-right'>" . moneda($credit_note['tax']) . "</td>";
                                break;

                            case 'tax_plus_tax':
                                echo "<td class='text-right'>" . moneda($credit_note['total'] + $credit_note['tax']) . "</td>";
                                break;

                            case 'returned':
                                echo "<td class='text-right'>" . moneda($credit_note['returned']) . "</td>";
                                break;

                            case 'comments':
                                echo "<td>" . ($credit_note['comments']) . "</td>";
                                break;

                            case 'to_returned':
                                echo "<td class='text-right'>" . moneda(($credit_note['total'] + $credit_note['tax']) - $credit_note['returned']) . "</td>";
                                break;

                            case 'robin':
                                echo "<td class='text-right'>" . moneda(($credit_note['total'] + $credit_note['tax']) - $credit_note['returned']) . "</td>";
                                break;

                            case 'status':
                                echo "<td>" . _tr(credit_notes_status_by_status($credit_note['status'])) . "</td>";
                                break;

                            default:
                                // Si no es un campo especial, simplemente lo muestra
                                echo "<td>" . ($credit_note[$field]) . "</td>";
                        }
                    }
                }

                //
                //
                //
                //
                //
                // Botones de acción
                echo "<td><a class='btn btn-primary btn-sm' href='index.php?c=credit_notes&a=details&id=" . $credit_note['id'] . "'><span class='glyphicon glyphicon-file'></span> " . _tr("Details") . "</a></td>";

                if (permissions_has_permission($u_rol, "credit_notes", "update")) {
                    echo "<td><a class='btn btn-danger btn-sm' href='index.php?c=credit_notes&a=edit&id=" . $credit_note['id'] . "' " . (!credit_notes_can_be_edit($credit_note["id"]) ? "disabled" : "") . "><span class='glyphicon glyphicon-edit'></span> " . _tr("Edit") . "</a></td>";
                }

                echo "<td>";
                print_dropdown("index.php?c=credit_notes&a=export_pdf&id=$credit_note[id]", credit_notes_field_id('client_id', $credit_note['id']), false);
                echo "</td>";

                echo "<td>";
                print_dropdown("index.php?c=credit_notes&a=export_pdf&way=pdf&id=$credit_note[id]", credit_notes_field_id('client_id', $credit_note['id']), false, 'glyphicon glyphicon-floppy-save');
                echo "</td>";

                echo "</tr>";
            }
            ?>  
        </tbody>
    </table>
    
</div>

<br>
<br>
