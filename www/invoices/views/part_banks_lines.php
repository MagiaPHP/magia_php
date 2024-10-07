<p>
    <a href="#" data-toggle="modal" data-target="#myModal_invoices_der_bank_lines">
        <?php echo icon('wrench'); ?>
    </a>
    <b><?php _t("List of bank lines with status"); ?> : <?php echo banks_lines_status_field_code('name', 30) ?></b>
</p>

<div class="modal fade" id="myModal_invoices_der_bank_lines" tabindex="-1" role="dialog" aria-labelledby="myModal_invoices_der_bank_linesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_invoices_der_bank_linesLabel">
                    <?php _t("Cols to show"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                include "form_invoices_der_bank_linesLabel.php";
                ?>
            </div>



        </div>
    </div>
</div>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>
            <?php
            foreach (json_decode(_options_option('config_invoices_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {
                echo '<th>' . ucfirst($col_to_show) . '</th>';
            }
            ?>
            <td></td>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;
        foreach (banks_lines_search_by('status', 30) as $key => $bll) {

            $bl = new Banks_lines();
            $bl->setBanks_lines($bll["id"]);
            $bl_class_date_operation = ($bl->getDate_operation() == $inv->getDate()) ? ' class="warning" ' : '';
//          $bl_class_total = ((float) abs($bl->getTotal()) == ( (float) $inv->getTotal()) + (float) $inv->getTax() ) ? ' class="text-right warning" ' : ' class="text-right" ';
            $bl_class_total = ((float) abs($bll['total']) == ( (float) $inv->getTotal()) + (float) $inv->getTax() ) ? ' class="text-right warning" ' : ' class="text-right" ';

            $bl_class_ce = ($bl->getCe() == $inv->getCe()) ? ' class="warning" ' : '';
            //$bl_class__account_sender = ($bl->getAccount_sender() == $inv->getCe()) ? ' class="warning" ' : '';




            include 'modalRegistrePayments.php';

            echo '<tr>';

            $config_invoices_der_bank_lines_to_show_json = _options_option('config_invoices_der_bank_lines_to_show');

            $config_invoices_der_bank_lines_to_show = (is_json($config_invoices_der_bank_lines_to_show_json)) ? $config_invoices_der_bank_lines_to_show : [];

//            foreach (json_decode(_options_option('config_invoices_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {
            // json_decode($config_invoices_der_bank_lines_to_show, true)

            foreach ($config_invoices_der_bank_lines_to_show as $col_to_show => $show_ok) {

                switch ($col_to_show) {
                    case 'id':
                        echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $bll[$col_to_show] . '">' . $bll[$col_to_show] . '</td>';
                        break;

                    case 'date_operation':
                        echo '<td ' . $bl_class_date_operation . '>' . $bll[$col_to_show] . '</td>';
                        break;

                    case 'total':
//                      $bl_class_total = ((float) abs($bll[$col_to_show]) == ( (float) $inv->getTotal()) + (float) $inv->getTax() ) ? ' class="text-right warning" ' : ' class="text-right" ';

                        echo '<td' . $bl_class_total . ' >' . $bll[$col_to_show] . ' </td>';
                        break;

                    case 'ce':
                        echo '<td ' . $bl_class_ce . '>' . $bll[$col_to_show] . '</td>';
                        break;

                    case 'status':
                        echo '<td>' . banks_lines_status_field_code('name', $bll[$col_to_show]) . '</td>';
                        break;

                    default:
                        echo '<td>' . $bll[$col_to_show] . '</td>';
                        break;
                }
            }
//                    echo '<td ' . $bl_class_date . ' >' . $bl->getDate_value() . '</td>';
//                    echo '<td>' . $bl->getMy_account() . '</td>';
//                    echo '<td>' . $bl->getOperation() . '</td>';
//                    echo '<td ' . $bl_class_total . ' >' . moneda($bl->getTotal()) . '</td>';
//                    echo '<td>' . $bl->getSender() . '</td>';
//                    //echo '<td>' . banks_lines_status_field_code('name', $bl->getStatus()) . '</td>';
//                    echo '<td ' . $bl_class_ce . ' >' . $bl->getCe() . '</td>';
//                    echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $bl->getId() . '">' . icon("eye-open") . '</a></td>';
            echo '<td>' . $modal . '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>

<a href="index.php?c=banks_lines"><?php _t("See all banks lines"); ?></a>