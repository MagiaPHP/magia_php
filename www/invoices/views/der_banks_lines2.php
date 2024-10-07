<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'registrePayments');
            }
            ?>

            <a name="registrePayments"></a>
            <?php _t("Bank lines"); ?>
        </h3>

    </div>
    <div class="panel-body">

        <?php
        //vardump($inv);  
        ?>

        <table class="table">
            <thead>
                <tr>                    

                    <th><?php _t("Date"); ?></th>
                    <th><?php _t("Account number"); ?></th>
                    <th><?php _t("N°"); ?></th>      
                    <th class="text-right"><?php _t("Total"); ?></th>
                    <th><?php _t("Sender"); ?></th>
                    <th><?php _t("Status"); ?></th>
                    <th><?php _t("Ce"); ?></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                // banks_lines_search_by('status_code', 30)
//                vardump(banks_lines_search_ready_to_reconciliation_for('+')); 


                foreach (banks_lines_search_ready_to_reconciliation_for('+') as $key => $bll) {

                    $bl = new Banks_lines();
                    $bl->setBanks_lines($bll["id"]);

                    $bl_class_ce = ($bl->getCe() == $inv->getCe()) ? ' class="warning" ' : '';
                    $bl_class_total = ((float) $bl->getTotal() == ( (float) $invoices['total']) + (float) $invoices['tax'] ) ? ' class="text-right warning" ' : ' class="text-right" ';

                    $modal = '

<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalRegistrePayments_' . $bl->getId() . '">
    ' . _tr("Add") . ' : ' . $bl->getId() . '
</button>


<div class="modal fade" id="myModalRegistrePayments_' . $bl->getId() . '" tabindex="-1" role="dialog" aria-labelledby="myModalRegistrePayments_' . $bl->getId() . 'Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalRegistrePayments_' . $bl->getId() . 'Label">
                    ' . _tr("Register a payment") . ' : ' . $bl->getId() . '
                </h4>
            </div>
            <div class="modal-body">



                <h4>   ' . _tr("Bank line details") . '</h4>
<div class="panel panel-default">
  <div class="panel-body">
                
                <p><b>' . _tr("My account number") . '</b> : ' . ($bl->getMy_account()) . '</p>
                <p><b>' . _tr("Operation") . '</b> : ' . ($bl->getOperation()) . '</p>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-body">                
                <p><b>' . _tr("Sender") . '</b> : ' . ($bl->getSender()) . '</p>
                <p><b>' . _tr("Sender account") . '</b> : ' . ($bl->getAccount_sender()) . '</p>
                <p><b>' . _tr("Description") . '</b> : ' . ($bl->getDescription()) . '</p>
                <p><b>' . _tr("Comunication") . '</b> : ' . ($bl->getComunication()) . '</p>
                <p><b>' . _tr("Ce") . '</b> : ' . ($bl->getCe()) . '</p>
                <p><b>' . _tr("Ref") . '</b> : ' . ($bl->getRef()) . '</p>
                <p><b>' . _tr("Ref2") . '</b> : ' . ($bl->getRef2()) . '</p>
                <p><b>' . _tr("Ref3") . '</b> : ' . ($bl->getRef3()) . '</p>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
                
<p><h3>' . _tr("Total") . '</b> : ' . moneda($bl->getTotal()) . '</h3>



  </div>
</div>


<form action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_payement_registre">
    <input type="hidden" name="invoice_id" value="' . $inv->getId() . '">    
    <input type="hidden" name="banks_lines_id" value="' . $bl->getId() . '">    
    <input type="hidden" name="redi" value="1">    
  
<button type="submit" class="btn btn-danger">
' . _tr("Record this payment for this invoice") . '
</button>
</form>




            </div>
            <div class="modal-footer">        
                
                
            </div>
        </div>
    </div>
</div>';

                    echo '<tr>';
//                    echo '<td>' . $i++ . '</td>';

                    echo '<td>' . $bl->getDate_value() . '</td>';
                    echo '<td>' . $bl->getMy_account() . '</td>';
                    echo '<td>' . $bl->getOperation() . '</td>';
                    echo '<td ' . $bl_class_total . ' >' . moneda($bl->getTotal()) . '</td>';
                    echo '<td>' . $bl->getSender() . '</td>';
//                    echo '<td>' . $bl->getStatus_code() . '</td>';
                    echo '<td ' . $bl_class_ce . ' >' . $bl->getCe() . '</td>';
                    echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $bl->getId() . '">' . icon("eye-open") . '</a></td>';
                    echo '<td>' . $modal . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <a href="index.php?c=banks_lines"><?php _t("See all banks lines"); ?></a>




    </div>
</div>



