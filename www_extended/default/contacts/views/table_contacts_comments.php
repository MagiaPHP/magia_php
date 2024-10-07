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
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Where"); ?></th>
            <th><?php _t("Comments"); ?></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $date_actual = null;
        $date_day = null;

        $i = 1;
        foreach ($comments as $key => $value) {

            $date_day = date_parse_from_format('Y-m-d', $value['date'])['day'];
            $date_month = date_parse_from_format('Y-m-d', $value['date'])['month'];
            ?>
            <tr>                                            

                <?php
                if ($date_day != $date_actual) {
                    echo "<tr><td colspan=5><b>" . _tr("Day") . ": $date_day  " . _tr(magia_dates_month($date_month)) . "</b></td></tr>";
                }
                ?>

                <td><?php echo ($value['date']); ?></td>

                <td>
                    <a href="index.php?c=<?php echo $value['doc']; ?>&a=details&id=<?php echo $value['doc_id']; ?>"><?php echo "$value[doc] $value[doc_id] "; ?></a>
                </td>

                <td>
                    <?php echo ($value['status']) ? $value['comment'] : "<strike>" . $value['comment'] . "</strike>"; ?>
                </td>
            </tr>
            <?php
            $date_actual = $date_day;

            $i++;
        }
        ?>
    </tbody>  
</table>