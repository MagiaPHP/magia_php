<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>



<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>




<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th></th>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Vat"); ?></th>
            <th><?php _t("Office name"); ?></th>
            <th><?php _t("Employees"); ?></th>
            <?php
            if (modules_field_module('status', 'audio')) {
                echo ' <th>' . _t("Orders") . '</th>';
            }
            ?>

            <th><?php _t("Status"); ?></th>
            <th><?php _t("Actions"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Vat"); ?></th>
            <th><?php _t("Office name"); ?></th>
            <th><?php _t("Employees"); ?></th>
            <?php
            if (modules_field_module('status', 'audio')) {
                echo ' <th>' . _t("Orders") . '</th>';
            }
            ?>            <th><?php _t("Status"); ?></th>
            <th><?php _t("Actions"); ?></th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $i = 1;
        foreach ($offices as $office) {
            ?>                   

            <tr>    
                <td><?php echo contacts_picture($office["id"], 60, 'image img-responsive img-thumbnail'); ?></td>    

                <td><?php echo $i; ?></td>
                <td><?php echo $office['id']; ?></td>
                <td><?php echo $office['tva']; ?></td>

                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $office['id']; ?>">
                        <?php echo $office['name']; ?>
                    </a>

                 <?php 
                     //vardump(contacts_childrens_of($id)); 
                 
                 /**
                  *    <ol>
                        <?php
                        $i = 1;
                        foreach (offices_list_by_headoffice($office['id']) as $key => $office) {


                            echo '<li><a href="index.php?c=contacts&a=details&id='.$office['id'].'">' . $office['name'] . '</a></li>';

                            echo '' . contacts_child($office['id'], false) . '';
                        }
                        
                        ?>
                    </ol>

                  */
                 ?>


                    <br>
                    <?php
//                    if (offices_is_headoffice($office['id'])) {
//                        echo _t("Headoffice");
//                    }
                    ?>

                </td>

                <td>
                    <?php //include "table_employees_by_office.php"; ?>
                </td>

                <?php if (modules_field_module('status', 'audio')) { ?>
                    <td>
                        <a href="index.php?c=contacts&a=orders_by_office&id=<?php echo $office['id']; ?>&status=all">
                            <?php echo orders_total_by_office_id($office['id']); ?>
                        </a>
                    </td>
                <?php } ?>



                <td><?php echo offices_status($office['status']); ?></td>

                <td>
                    <a 
                        class="btn btn-sm btn-primary" 
                        href="index.php?c=contacts&a=details&id=<?php echo $office['id']; ?>">
                            <?php _t("Details"); ?>
                    </a>


                    <?php
                    if (permissions_has_permission($u_rol, "offices", "delete")) {
                        //  include "modal_offices_delete.php";
                    }
                    ?>
                </td>
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>  
</table>



