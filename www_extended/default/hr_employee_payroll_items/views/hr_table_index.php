<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>




<table class="table table-striped">
    <thead>
        <tr class="info">                              
            <th><?php _t("Worker"); ?></th>
            <th class="text-right"><?php _t("Precompte"); ?></th>
            <th></th>
        </tr>
    </thead>


    <tbody>
        <tr>
            <?php
            foreach (employees_list_by_company($u_owner_id) as $key => $employee) {

                $precompte = hr_employee_payroll_items_default_value_by_employee_id_code($employee['contact_id'], 7050) ?? 0;

                $selected = ($id == $employee['contact_id']) ? ' class="success" ' : "";

                echo '<tr ' . $selected . '>';
                echo '<td><a href="index.php?c=contacts&a=details&id=' . $employee['contact_id'] . '">' . contacts_formated($employee['contact_id']) . '</a></td>';

                echo '<td  class="text-right">' . moneda($precompte) . '</td>';
                echo '<td>';
                include 'hr_modal_precompte_update.php';
                echo '</td>';
                echo '</tr>';
            }
            ?>	
        </tr>
    </tbody>
</table>
