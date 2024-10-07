<style>
    .imgdisabled{
        opacity: 0.15;
    }
    img:hover {
        opacity: 0.5;
    }
</style>


<a href="index.php?c=modules&a=tables">Tables in DB </a> | Modules in table <code>Modules</code>





<table class="table table-condensed">

    <thead>
        <tr class="info">
            <th>#</th>
            <th><?php _t("Label"); ?></th>
            <th><?php _t("Module"); ?></th>            
            <th><?php _t("Table in DB"); ?></th>            
            <th></th>            
        </tr>
    </thead>

    <tfoot>
        <tr class="info">
            <th>#</th>
            <th><?php _t("Label"); ?></th>
            <th><?php _t("Module"); ?></th>            
            <th><?php _t("Table in DB"); ?></th>            
            <th></th>            
        </tr>
    </tfoot>

    <tbody>

        <?php
        $i = 1;
        foreach (modules_list() as $key => $module) {

            $has_table_in_db = (db_table_exists($module['module'])) ? true : false;

            $link_delete = (!$has_table_in_db) ? '<a href="index.php?c=modules&a=ok_delete&id=' . $module['id'] . '&redi[redi]=5&redi[c]=modules&redi[a]=modules">' . _tr("No, Delete") . '</a>' : _tr("Yes");

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $module['label'] . '</td>';
            echo '<td>' . $module['module'] . '</td>';
            echo '<td>' . $link_delete . '</td>';
            
            echo '</tr>';
        }
        ?>

    </tbody>

</table>