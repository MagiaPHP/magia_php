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



<table class="table table-striped table-condensed table-bordered">
    <thead>
        <tr class="info">
            <th>#</th>
            <th><?php _t("Role"); ?></th>
            <th><?php _t("Controllers"); ?></th>
            <th><?php _t("Create"); ?></th>
            <th><?php _t("Read"); ?></th>
            <th><?php _t("Update"); ?></th>
            <th><?php _t("Delete"); ?></th>            
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>#</th>
            <th><?php _t("Role"); ?></th>
            <th><?php _t("Controllers"); ?></th>
            <th><?php _t("Create"); ?></th>
            <th><?php _t("Read"); ?></th>
            <th><?php _t("Update"); ?></th>
            <th><?php _t("Delete"); ?></th>            
        </tr>
        </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($permissions as $key => $value) {
            ?>
            <tr>                                            
                <td><?php echo $i++; ?></td>
                <td><?php echo $value['rol']; ?></td>
                <td>
                    <?php echo ($value['controller']); ?>
                </td>

                <td><?php echo ($value['crud'][0]) ? "Yes" : "-"; ?></td>
                <td><?php echo ($value['crud'][1]) ? "Yes" : "-"; ?></td>
                <td><?php echo ($value['crud'][2]) ? "Yes" : "-"; ?></td>
                <td><?php echo ($value['crud'][3]) ? "Yes" : "-"; ?></td>                                                                                                        
            </tr>
            <?php
            $i++;
        }
        ?>
    </tbody>  
</table>