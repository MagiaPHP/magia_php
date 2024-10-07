<style>
    .imgdisabled{
        opacity: 0.15;
    }
    img:hover {
        opacity: 0.5;
    }
</style>


Tables in DB | <a href="index.php?c=modules&a=modules">Modules in table Modules</a>


<table class="table table-condensed">

    <thead>
        <tr class="info">
            <th>#</th>
            <th><?php _t("Table name"); ?></th>
            <th><?php _t("Type"); ?></th>            
            <th><?php _t("Module"); ?></th>            
            <th></th>            
        </tr>
    </thead>

    <tbody>

        <?php
        $i = 1;
        foreach (db_list_tables_from_db($config_db) as $key => $table) {


            $has_module = (modules_exists_module($table['name'])) ? _tr("Yes") : _tr("No");

            echo '<tr>';
            echo '<td>' . $i++ . '</td>';
            echo '<td>' . $table['name'] . '</td>';
            echo '<td>' . $has_module . '</td>';
            echo '<td>' . $table['type'] . '</td>';
            echo '</tr>';
        }
        ?>

    </tbody>

</table>