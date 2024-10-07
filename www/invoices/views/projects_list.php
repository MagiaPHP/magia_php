<table class="table table-striped">
    <thead>
        <tr>

            <th><?php _t("Id"); ?></th>            
            <th class="text-right"><?php _t("Project name"); ?></th>
            <th class="text-right"><?php _t("Value"); ?></th>
            <th class="text-right"></th>

        </tr>
    </thead>
    <tbody>                     
        <?php
        $i = 1;
        $total = 0;

        foreach (projects_inout_search_by('invoice_id', $inv->getId()) as $key => $pro_list) {

            $pinout = new Projects_inout();
            $pinout->setProjects_inout($pro_list['id']);
            ?>

            <tr class="<?php echo $class; ?>">

                <td><?php echo $pinout->getProject_id(); ?></td>

                <td>
                    <?php if (permissions_has_permission($u_rol, 'projects', "read")) { ?>
                        <a href="index.php?c=projects&a=details&id=<?php echo $pinout->getProject_id(); ?>">
                            <?php echo projects_field_id('name', $pinout->getProject_id()); ?>
                        </a>
                    <?php } else { ?>
                        <?php echo projects_field_id('name', $pinout->getProject_id()); ?>
                    <?php } ?>                    
                </td>

                <td class="text-right"><?php echo moneda($pinout->getValue()) ?></td>

                <td class="">    
                    <?php if (1 == 1) { ?>
                        <?php include "modal_remove_invoice.php"; ?>
                        <?php
                    } else {
                        echo "<a href=\"index.php?c=balance&a=search&w=cancelCode&txt=$balance_item[canceled_code]\" >$balance_item[canceled_code]</a>";
                    }
                    ?>
                </td>
            </tr>    

            <?php
            $i++;
        }
        ?>                       
    </tbody>



    <tr>
        <td></td>        
        <td class="text-right"><?php _t("Value assigned to projects"); ?></td>
        <td class="text-right"><?php echo moneda(projects_inout_total_by_invoice_id($inv->getId())); ?></td>
        <td></td>
    </tr>

    <tr>
        <td></td>        
        <td class="text-right"><?php _t("Available to assign"); ?></td>
        <td class="text-right"><?php
            // ( total + tax del expense ) - projects_inout_total_by_expense_id()
            echo moneda(invoices_available_to_assign($inv->getId()));
            ?></td>
        <td></td>
    </tr>



    <form method="post" action="index.php">

        <input type="hidden" name="c" value="projects_inout">
        <input type="hidden" name="a" value="ok_add_invoice">
        <input type="hidden" name="budget_id" value="null">
        <input type="hidden" name="invoice_id" value="<?php echo $inv->getId(); ?>">
        <input type="hidden" name="expense_id" value="null">
        <input type="hidden" name="redi[redi]" value="6">
        <tr>
            <td></td>
            <td>
                <div class="form-group">
                    <label for="project_id" class="sr-only"><?php _t("Project id"); ?></label>
                    <select 
                        class="form-control" 
                        name="project_id"
                        <?php echo (!projects_inout_list_without_invoice_id($inv->getId()) || invoices_available_to_assign($inv->getId()) <= 0) ? 'disabled' : ''; ?>
                        >
                            <?php
                            // lista de proyecto que no esten con el expense id x
                            foreach (projects_inout_list_without_invoice_id($inv->getId()) as $key => $pro_lit) {
                                echo '<option value="' . $pro_lit['id'] . '">' . $pro_lit['name'] . '  > ' . contacts_formated($pro_lit['contact_id']) . '</option>';
                            }
                            ?>
                    </select>
                </div>
            </td>


            <td>
                <div class="form-group">
                    <label for="value" class="sr-only"><?php _t("Value"); ?></label>
                    <input 
                        type="number" 
                        step="any" 
                        class="form-control" 
                        name="value" 
                        id="value" 
                        placeholder="<?php echo _t("Value max."); ?> : <?php echo invoices_available_to_assign($inv->getId()); ?>" 
                        required=""
                        value="<?php echo invoices_available_to_assign($inv->getId()); ?>"
                        <?php echo (!projects_inout_list_without_invoice_id($inv->getId()) || invoices_available_to_assign($inv->getId()) <= 0 ) ? 'disabled' : ''; ?>
                        >
                </div>

            </td>

            <td>

                <button type="submit" class="btn btn-default" <?php echo (!projects_inout_list_without_invoice_id($inv->getId()) || invoices_available_to_assign($inv->getId()) <= 0 ) ? 'disabled' : ''; ?>  >
                    <?php echo icon("plus"); ?> 
                    <?php _t("Add"); ?>
                </button>

            </td>

        </tr>
    </form>




</table>
