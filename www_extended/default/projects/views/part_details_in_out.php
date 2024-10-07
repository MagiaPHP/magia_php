
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
        foreach (projects_inout_by_project_id($projects->getId()) as $key => $piobpi) {

            $proinout = new Projects_inout();
            $proinout->setProjects_inout($piobpi['id']);

            if ($proinout->getInvoice_id()) {
                echo '
                    <tr>
                        <td class="text-left">
                        <a href="index.php?c=invoices&a=details&id=' . $proinout->getInvoice_id() . '">' . _tr("Invoice number") . ': ' . $proinout->getInvoice_id() . '</a>
                            <br>
                        ' . invoices_field_id('title', $proinout->getInvoice_id()) . '    
                        </td>
                        <td class="text-right"></td>
                        <td class="text-right"><p class="text-primary">' . moneda($proinout->getValue()) . '</p></td>            
                    </tr>';
            }
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////

            if ($proinout->getExpense_id()) {
                echo '
                    <tr>
                        <td class="text-left">

                        <a href="index.php?c=expenses&a=details&id=' . $proinout->getExpense_id() . '">' . _tr("Expense number") . ' ' . $proinout->getExpense_id() . '</a>
                            <br>
                            ' . expenses_field_id('title', $proinout->getExpense_id()) . '
                        </td>
                        <td class="text-right"><p class="text-warning">' . moneda($proinout->getValue()) . '</p></td>
                        <td></td>
                    </tr>';
            }
        }
        ?>
    </tbody>

    <tfoot>
        <tr>
            <td></td>
            <td class="text-right"><p class="text-warning">(b) <?php echo moneda(projects_inout_total_out($projects->getId())); ?></p></td>      
            <td class="text-right"><p class="text-primary">(a) <?php echo moneda(projects_inout_total_in($projects->getId())); ?></p></td>

        </tr>

        <tr>
            <td></td>        
            <td><?php _t("Situation"); ?></td>        
            <td class="text-right">
                <?php
                $situation = projects_inout_total_in($projects->getId()) - projects_inout_total_out($projects->getId());
                if ($situation < 0) {
                    echo '<p class="text-warning">(a-b) ' . icon("thumbs-down") . ' ' . moneda($situation) . '</p>';
                } else {
                    echo '<p class="text-primary">(a-b) ' . icon("thumbs-up") . ' ' . moneda($situation) . '</p>';
                }
                ?>
            </td>            
        </tr>
    </tfoot>

</table>