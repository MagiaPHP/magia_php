

<?php
$remakes_list = orders_list_remake_by_order_id($id);

if (!$remakes_list) {
    message('info', 'No registered copies');
} else {
    ?>


    <style>
        th {
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 2;
        }
    </style>


    <table class="table table-striped table-condensed table-bordered" >
        <thead>
            <tr class="info">
                <th><?php _t("#"); ?></th>
                <th><?php _t("Remake"); ?></th>            
                <th><?php _t("Motifs"); ?></th>            
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th><?php _t("#"); ?></th>
                <th><?php _t("Remake"); ?></th>            
                <th><?php _t("Motifs"); ?></th>            
            </tr>
        </tfoot>

        <tbody>
            <?php
            $i = 1;
            foreach ($remakes_list as $key => $remakes) {
                echo ' <tr>';
                echo '<td>' . $i . '</td>            ';
                echo '<td>';
                echo shop_orders_id_formated($remakes['id'], 1);
                echo '</td>';

                echo "<td>";

                foreach (orders_remake_list_by_order_id($remakes['id']) as $key => $motif) {
                    echo "<p><span class=\"glyphicon glyphicon-chevron-right\"></span> $motif[motif]</p> ";
                }

                echo "</td>";
                echo '</tr>';
                $i++;
            }
            ?>


        </tbody>
    </table>

<?php } ?>

