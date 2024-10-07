<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;

    }
</style>

<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">      
            <th><?php _t("Sender"); ?></th>
            <th><?php _t("My ref."); ?></th>            
            <th><?php _t("Date registre"); ?></th>                    
            <th><?php _t("Cliente"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <th><?php _t("Edit"); ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> </th>                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> </th>                                                                     
        </tr>
    </thead>
    <tfoot>
        <tr>         
            <th><?php _t("Sender"); ?></th>
            <th><?php _t("My ref."); ?></th>
            <th><?php _t("Date registre"); ?></th>                    
            <th><?php _t("Cliente"); ?></th>                    
            <th class="text-right"><?php _t("Total"); ?></th>
            <th class="text-right"><?php _t("Advance"); ?></th>
            <th class="text-right"><?php _t("Solde"); ?></th>                                        
            <th><?php _t("Reminders"); ?></th>
            <th><?php _t("Status"); ?></th>                    
            <th><?php _t("Details"); ?></th>                                                                      
            <th><?php _t("Edit"); ?></th>                                                                      
            <th><span class="glyphicon glyphicon-print"></span> </th>                                                                     
            <th><span class="glyphicon glyphicon-floppy-save"></span> </th>                                                                     
        </tr>
    </tfoot>    
    <tbody>

        <?php
        $total_total = 0;
        $total_advance = 0;

        $del = false;

        foreach ($expenses as $expenses_search_by_client_id) {

            $expense = new Expenses();
            $expense->setExpenses($expenses_search_by_client_id['id']);

            if ($expense->getStatus() != -10 && $expense->getStatus() != -20) {

                $total_total = $total_total + ($expense->getTotal() + $expense->getTax());
                $total_advance = $total_advance + $expense->getAdvance();
            }

            if ($expense->getStatus() == -10 || $expense->getStatus() == -20) {

                $del = true;
            }

            $r1 = ($expense->getR1()) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r2 = ($expense->getR2()) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            $r3 = ($expense->getR3()) ? "<span class=\"glyphicon glyphicon-thumbs-down\"></span>" : "";
            ?>


            <tr>
                <td>***
                    <?php
                    /**
                     * <a href="index.php?c=contacts&a=details&id=<?php echo "$expense->[client_id]"; ?>">
                      <?php echo contacts_formated($expense->['client_id']); ?>
                      </a>
                     */
                    ?>
                    <br>
                    <?php echo $expense->getTitle(); ?>
                </td>

                <td><?php echo $expense->getId(); ?></td>

                <td><a href="index.php?c=budgets&a=details&id=<?php echo "$expense->getBudget_id()"; ?>"><?php echo "$expense->getBudget_id()"; ?></a></td>
                <td><?php echo "$expense->getCredit_note_id()"; ?></td>
                <td><?php echo "$expense->getDate_registre()"; ?></td>

                <td>

                    <?php
                    /**
                     * <a href="index.php?c=contacts&a=details&id=<?php echo "$expense->[client_id]"; ?>"><?php echo contacts_formated($expense->['client_id']); ?></a>

                     */
                    ?>

                    <br>
                    <?php echo $expense->getTitle(); ?>
                </td>


                <td class="text-right text-strike">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($expense->getTotal() + $expense->getTax()); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>
                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($expense->getAdvance()); ?>
                    <?php echo ($del) ? "</del>" : ""; ?>
                </td>
                <td class="text-right">
                    <?php echo ($del) ? "<del>" : ""; ?>
                    <?php echo monedaf($expense->getTotal() + $expense->getTax() - $expense->getAdvance()); ?>
                    <?php echo ($del) ? "<del>" : ""; ?>
                </td>


                <td><?php echo "$r1 $r2 $r3"; ?></td>

                <td><?php echo expenses_status_by_status($expense->getStatus()); ?></td>


                <td>                     
                    <a class="btn btn-sm btn-primary" href="index.php?c=expenses&a=details&id=<?php echo "$expense->getId()"; ?>">
                        <span class="glyphicon glyphicon-file"></span> <?php _t("Details"); ?>
                    </a>
                </td>


                <td>                     
                    <a class="btn btn-sm btn-danger" href="index.php?c=expenses&a=edit&id=<?php echo "$expense->getId()"; ?>">
                        <span class="glyphicon glyphicon-edit"></span> <?php _t("Edit"); ?>
                    </a>
                </td>


                <td>                                          
                    <div class="dropdown">
                        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-print"></span>
                            <?php // _t("Print");      ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach (_languages_list_by_status(1) as $key => $lang) {

                                $icon = ($lang['language'] == contacts_field_id('language', $id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                                ?>
                                <li>
                                    <a href="index.php?c=expenses&a=export_pdf&id=<?php echo $expense->getId(); ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                                        <?php echo $icon; ?>
                                        <?php echo _t($lang['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
                <td>                                          
                    <div class="dropdown">
                        <button class="btn btn-sm btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <span class="glyphicon glyphicon-floppy-save"></span>                                
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?php
                            foreach (_languages_list_by_status(1) as $key => $lang) {
                                $icon = ($lang['language'] == contacts_field_id('language', $id)) ? '<span class="glyphicon glyphicon-chevron-right"></span>' : '';
                                ?>
                                <li>
                                    <a href="index.php?c=expenses&a=export_pdf&way=pdf&id=<?php echo $expense->getId(); ?>&lang=<?php echo $lang['language']; ?>" target="_print">
                                        <?php echo $icon; ?>
                                        <?php echo _t($lang['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </td>
            </tr>




            <?php
            $del = false;
        }
        ?>

        <tr>         
            <td><?php // _t("Invoice");                             ?></td>
            <td><?php // _t("Budget");                             ?></td>
            <td><?php // _t("Credit note");                             ?></td>
            <td><?php // _t("Date registre");                             ?></td>                    
            <td><?php // _t("Cliente");                             ?></td>                    
            <td class="text-right"><?php echo moneda($total_total); ?></td>
            <td class="text-right"><?php echo moneda($total_advance); ?></td>
            <td class="text-right"><?php echo moneda($total_total - $total_advance); ?></td>                                        
            <td><?php // _t("Reminders");                             ?></td>
            <td><?php // _t("Status");                             ?></td>                    
            <td><?php // _t("Details");                             ?></td>                                                                      
            <td><?php // _t("Edit");                             ?></td>                                                                      

            <td></td>
            <td></td>
            <td></td>
        </tr>


    </tbody>  
</table>