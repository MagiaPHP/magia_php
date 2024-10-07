<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "izq_advanced.php"; ?>
    </div>

    <div class="col-sm-9 col-md-9 col-lg-9">
        <h1><?php _t("Advanced search"); ?></h1>

        <?php
        if ($action == "edit") {
            foreach ($error as $key => $value) {
                // message("info", "$value");
            }
        }
        ?>

        Lista de empleados en la oficina


        <table class="table table-striped" border>
            <thead>
                <tr>
                    <th><?php echo _t("Office name"); ?></th>                                        
                    <th><?php echo _t("Orders by office"); ?></th>                    
                    <th><?php echo _t("Name"); ?></th>                    
                    <th><?php echo _t("Lastname"); ?></th>                    
                </tr>
            </thead>

            <tbody>
                <?php
                foreach (offices_list_by_headoffice($company_id) as $key => $office) {


                    $emplyees_by_office = employees_list_by_company($office['id']);
                    echo "
                <tr>
                    <td>" . contacts_field_id("name", $office['id']) . "</td>
                    ";
                    // empleados 
                    ?>

                <td class="text-center">
                    <?php
                    $total_orders_by_office = orders_total_by_company_id($office['id']);

                    echo ($total_orders_by_office) ? '<a href="index.php?c=orders&a=search&txt=' . $office['id'] . '&w=company_id&status=all">' . $total_orders_by_office . '</a>' : "";
                    ?>
                </td>
                <td>


                    <table>

                        <?php
                        foreach ($emplyees_by_office as $key => $employee) {
                            $name = contacts_field_id("name", $employee['contact_id']);
                            $lastname = contacts_field_id("lastname", $employee['contact_id']);

                            $role = users_field_contact_id('rol', $employee['contact_id']);

                            echo ($name != "") ? "<tr><td>$lastname $name </td></tr>" : "<tr><td>-</td></tr>";
                            //  echo ($name != "") ? "<td>$name</td></tr>" : "<td>--</td></tr>";
                        }
                        ?>
                    </table>

                </td>

                <?php
                echo "
                    <td>email</td>                                        
                </tr>";
            }
            ?>
            </tbody>

        </table>








    </div>
</div>

<?php include view("home", "footer"); ?>  