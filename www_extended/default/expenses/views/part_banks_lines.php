<p>
    <a href="#" data-toggle="modal" data-target="#myModal_expenses_der_bank_lines">
        <?php echo icon('wrench'); ?>
    </a>
    <?php _t("List of bank lines with status"); ?> : <b><?php echo _tr(banks_lines_status_field_code('name', 40)) ?></b>
</p>

<div class="modal fade" id="myModal_expenses_der_bank_lines" tabindex="-1" role="dialog" aria-labelledby="myModal_expenses_der_bank_linesLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_expenses_der_bank_linesLabel">
                    <?php _t("Columns to show"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                include "form_expenses_der_bank_linesLabel.php";
                ?>
            </div>
        </div>
    </div>
</div>



<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>
            <?php
            foreach (json_decode(_options_option('config_expenses_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
            }
            ?>
            <td></td>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 1;

//        vardump($expense); 

        foreach (banks_lines_search_by_status(40) as $key => $bll) {

            if ($u_rol == 'root') {
//                vardump($expense->getTo_pay());
//                vardump(abs($bll['total'])); 
//                vardump($bll); 
                // vardump((float) abs($expense->getTo_pay()));
            }



            if (abs($bll['total']) == abs($expense->getTo_pay())) {

                $bl = new Banks_lines();
                $bl->setBanks_lines($bll["id"]);

                $bl_class_date_operation = ($bl->getDate_operation() == $expense->getDate()) ? ' class="warning" ' : '';

                $bl_class_total = ( abs($bll['total']) == abs($expense->getTo_pay()) ) ? ' class="text-right warning" ' : ' class="text-right" ';

                $bl_class_ce = ($bl->getCe() == $expense->getCe()) ? ' class="warning" ' : '';

                include 'modalRegistrePayments.php';

                echo '<tr>';

                foreach (json_decode(_options_option('config_expenses_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {

                    switch ($col_to_show) {
                        case 'id':
                            echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $bll[$col_to_show] . '">' . ($bll[$col_to_show]) . '</a></td>';
                            break;
                        case 'date_operation':
                            echo '<td ' . $bl_class_date_operation . '>' . ($bll[$col_to_show]) . '</td>';
                            break;

                        case 'total':
                            echo '<td width="100" ' . $bl_class_total . ' >' . moneda($bll[$col_to_show]) . ' </td>';
                            break;

                        case 'ce':
                            echo '<td ' . $bl_class_ce . '>' . ($bll[$col_to_show]) . '</td>';
                            break;

                        case 'status':
                            echo '<td>' . (banks_lines_status_field_code('name', $bll[$col_to_show])) . '</td>';
                            break;

                        default:
                            echo '<td>' . ($bll[$col_to_show]) . '</td>';
                            break;
                    }
                }
                echo '<td>' . $modal . '</td>';

                echo '</tr>';
            }
        }
        ?>
    </tbody>
</table>

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr>
            <?php
            foreach (json_decode(_options_option('config_expenses_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
            }
            ?>
            <td></td>
        </tr>
    </thead>
    **
    <tbody>
        <?php
        $i = 1;

        foreach (banks_lines_search_by_status(40) as $key => $bll) {



            $bl = new Banks_lines();
            $bl->setBanks_lines($bll["id"]);

            $bl_class_date_operation = ($bl->getDate_operation() == $expense->getDate()) ? ' class="warning" ' : '';

            $bl_class_total = ( abs($bll['total']) == abs($expense->getTo_pay()) ) ? ' class="text-right warning" ' : ' class="text-right" ';

            $bl_class_ce = ($bl->getCe() == $expense->getCe()) ? ' class="warning" ' : '';

            include 'modalRegistrePayments.php';

            echo '<tr>';

            foreach (json_decode(_options_option('config_expenses_der_bank_lines_to_show'), true) as $col_to_show => $show_ok) {

                switch ($col_to_show) {
                    case 'id':
                        echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $bll[$col_to_show] . '">' . ($bll[$col_to_show]) . '</a></td>';
                        break;
                    case 'date_operation':
                        echo '<td ' . $bl_class_date_operation . '>' . ($bll[$col_to_show]) . '</td>';
                        break;

                    case 'total':
                        echo '<td width="100" ' . $bl_class_total . ' >' . moneda($bll[$col_to_show]) . ' </td>';
                        break;

                    case 'ce':
                        echo '<td ' . $bl_class_ce . '>' . ($bll[$col_to_show]) . '</td>';
                        break;

                    case 'status':
                        echo '<td>' . (banks_lines_status_field_code('name', $bll[$col_to_show])) . '</td>';
                        break;

                    default:
                        echo '<td>' . ($bll[$col_to_show]) . '</td>';
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
            //echo '<td>' . $modal . '</td>';
            echo '<td>' . $modal . '</td>';

            echo '</tr>';
        }
        ?>
    </tbody>
</table>

<a href="index.php?c=banks_lines"><?php _t("See all banks lines"); ?></a>

