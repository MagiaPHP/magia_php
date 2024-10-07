
<table class="table table-bordered table-striped">
    <thead>
        <tr>                        
            <th class="text-left"><?php _t('Description'); ?></th>
            <th class="text-right">-</th>            
            <th class="text-right">+</th>            
        </tr>
    </thead>

    <tbody>


        <?php
//        vardump(budgets_search_by_client($projects->getContact_id())); 


        foreach (budgets_search_by_client($projects->getContact_id()) as $key => $bsbci) {

            $budget_by_client = new Budgets();
            $budget_by_client->setBudgets($bsbci['id']);

            echo '
                    <tr>
                        <td class="text-left">
                        <a href="index.php?c=budgets&a=details&id=' . $budget_by_client->getId() . '">' . _tr("Budget number") . ': ' . $budget_by_client->getId() . '</a>
                            <br>
                        ' . invoices_field_id('title', $budget_by_client->getId()) . '    
                        </td>
                        <td class="text-right"></td>
                        <td class="text-right"><p class="text-primary">' . moneda($budget_by_client->getTotal() + $budget_by_client->getTax()) . '</p></td>            
                    </tr>';

            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
//            if ($budget_by_client->getExpense_id()) {
//                echo '
//                    <tr>
//                        <td class="text-left">
//
//                        <a href="index.php?c=expenses&a=details&id=' . $budget_by_client->getExpense_id() . '">' . _tr("Expense number") . ' ' . $budget_by_client->getExpense_id() . '</a>
//                            <br>
//                            ' . expenses_field_id('title', $budget_by_client->getExpense_id()) . '
//                        </td>
//                        <td class="text-right"><p class="text-warning">' . $budget_by_client->getValue() . '</p></td>
//                        <td></td>
//                    </tr>';
//            }
//            
        }
        ?>
    </tbody>

    <tfoot>
        <tr>
            <td></td>
            <td class="text-right"><p class="text-warning"><?php echo moneda(projects_inout_total_out($projects->getId())); ?></p></td>      
            <td class="text-right"><p class="text-primary"><?php echo moneda(projects_inout_total_in($projects->getId())); ?></p></td>

        </tr>

        <tr>
            <td></td>        
            <td><?php _t("Situation"); ?></td>        
            <td class="text-right">
                <?php
                $situation = projects_inout_total_in($projects->getId()) - projects_inout_total_out($projects->getId());
                if ($situation < 0) {
                    echo '<p class="text-warning">' . moneda($situation) . '</p>';
                } else {
                    echo '<p class="text-primary">' . moneda($situation) . '</p>';
                }
                ?>
            </td>            
        </tr>
    </tfoot>

</table>