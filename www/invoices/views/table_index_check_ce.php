

<table class="table table-striped" border>
    <thead>
        <tr> 


            <th>Invoice</th>
            <th>Total</th>
            <th>ce</th>
            <th>Error</th>
            <th>Error</th>
        </tr>
    </thead>
    <tfoot>


    </tfoot>
    <tbody>

        <?php
        $i = 0;

        $lista_ce = array();

        $existe = false;
        $error_number = false;

        $i = 0;
        foreach ($invoices as $key => $invoice) {

            $id_actual = $invoice['id'];
            $ce = $invoice['ce'];
            $ce_generada = ce_create($invoice['id'], $invoice['date_registre']);
            $error = ($ce != $ce_generada ) ? "ce no es igual a la ce de verificacion" : "";

            if (in_array($ce, $lista_ce)) {
                $existe = "ce  ya existe en otra factura";
            } else {
                array_push($lista_ce, $ce);
            }
//
            if ($invoices[$i + 1] && $invoices[$i + 1]['id']) {
                if ($id_actual + 1 != $invoices[$i + 1]['id']) {
                    $error_number = "Siguiente deberia ser:  " . ($id_actual + 1);
                }
            }

            echo '<tr>';
            // echo '<td>' . $i . '</td>';
            echo '<td>' . $invoice["id"] . '</td>';
            echo '<td class="text-right" >' . moneda($invoice["total"] + $invoice["tax"]) . '</td>';
            echo '<td>' . $invoice["ce"] . '</td>';
            //    echo '<td>' . $ce_generada . '</td> ';
            //    echo '<td>' . $error . '</td> ';
            echo '<td>' . $existe . '</td> ';
            echo '<td>' . $error_number . '</td> ';
            echo '</tr>';

            $i++;
            $existe = false;
            $error_number = false;
        }
        ?>



    </tbody>
</table>

