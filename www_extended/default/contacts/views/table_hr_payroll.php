<table class="table table-striped">
    <thead>
        <tr>            
            <?php // hr_payroll_index_generate_column_headers($cols_to_show_keys); ?>     
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Month"); ?></th>
            <th><?php _t("Date start"); ?></th>
            <th><?php _t("Date end"); ?></th>
            <th class="text-right"><?php _t("To pay"); ?></th>
            <th class="text-right"><?php _t("Paid"); ?></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Verifica si el array $hr_payroll está vacío y muestra un mensaje si es así
        if (!$hr_payroll) {
            message("info", "No items");
        }

        // Recorre cada elemento del array $hr_payroll
        foreach ($hr_payroll as $hr_payroll_item) {

            // Crea un objeto Payroll para manejar la información de la nómina
            $payroll = new Payroll();
            $payroll->setHr_payroll($hr_payroll_item['id']);  // Establece la nómina actual usando el ID

            echo '<tr>';  // Inicia una nueva fila de la tabla
            // Muestra los datos de la nómina
            echo '<td>' . ($payroll->getId()) . '</td>';  // ID de la nómina
            // Muestra el mes de la nómina formateado
            echo '<td>' . magia_dates_month($hr_payroll_item['month']) . '</td>';

            // Muestra la fecha de inicio y fin de la nómina utilizando una función de formateo
            echo '<td>' . magia_dates_formated($payroll->getDate_start()) . '</td>';
            echo '<td>' . magia_dates_formated($payroll->getDate_end()) . '</td>';

            // Muestra los montos a pagar y pagados formateados como moneda
            echo '<td class="text-right">' . moneda($payroll->getTo_pay()) . '</td>';
            echo '<td class="text-right">' . moneda($payroll->getTotalAlreadyPaid()) . '</td>';

            // Botones de acción para detalles, editar, exportar a PDF y guardar
            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=details&id=' . $payroll->getId() . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=edit&id=' . $payroll->getId() . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
            if ($payroll->getStatus() == $payroll::STATUS_UNPAID) {
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_payroll&a=payment&id=' . $payroll->getId() . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
            } else {
                echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=payment&id=' . $payroll->getId() . '">' . icon("shopping-cart") . ' ' . _tr('Payments details') . '</a></td>';
            }
            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=export_pdf&id=' . $payroll->getId() . '">' . icon("print") . '</a></td>';
            echo '<td><a class="btn btn-sm btn-default" href="index.php?c=hr_payroll&a=export_pdf&way=pdf&&id=' . $payroll->getId() . '">' . icon("floppy-save") . '</a></td>';

            echo '</tr>';  // Cierra la fila de la tabla
        }
        ?>  
    </tbody>
</table>
