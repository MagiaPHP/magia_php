<style>
    th {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        z-index: 2;
    }
</style>

Cada controlador debe tener: un modulo, aqui la lista de controladores que no tienen modulos

<table class="table table-striped table-condensed table-bordered" >
    <thead>
        <tr class="info">
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Module"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Controller"); ?></th>
            <th><?php _t("Module"); ?></th>
            <th><?php _t("Action"); ?></th>                                                                      
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <?php
            foreach ($controllers as $controller) {

                $module = modules_field_module('module', $controller['controller']);

                $link = (!$module) ? ' <a href="index.php?c=modules&a=add&module=' . $controller['controller'] . '">' . _tr("Add like module") . '</a> ' : '';
                if (!$module) {
                    echo "<tr id=\"$controller[id]\">";
                    echo "<td>$controller[id]</td>";
                    echo "<td>$controller[controller]</td>";
                    echo "<td>$module $link </td>";
                    //echo "<td>$menu</td>";
                    echo "</tr>";
                }
            }
            ?>	
        </tr>
    </tbody>
</table>

<?php //$pagination->createHtml(); ?>

