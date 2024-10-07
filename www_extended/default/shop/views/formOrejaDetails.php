
<?php //echo $s;      ?>

<?php
switch ($s) {
    case 'L':
        $side = 'Left';
        $panel_class = "primary";
        break;
    case 'R':
        $side = 'Right';
        $panel_class = "primary";
        break;
    case 'L':
        $side = 'Stereo';
        $panel_class = "default";
        break;

    default:
        break;
}
?>


<div class="panel panel-<?php echo "$panel_class"; ?>">
    <div class="panel-heading"><b>
            <?php _t("Ear"); ?>: <?php _t($side); ?></b>
    </div>
    <div class="panel-body">


        <table class="table table-striped">

            <thead>
                <tr>
                    <th><?php _t("#"); ?></th>
                    <th><?php _t("Code"); ?></th>
                    <th><?php _t("Quantity"); ?></th>
                    <th><?php _t("Description"); ?></th>
                </tr>
            </thead>


            <?php
            $i = 1;
            foreach (shop_orders_lines($id, $s) as $key => $item) {
                echo "<tr>";
                //echo "<td>". products_get_category_by_code($item['code'])."</td>"; 
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $item['code'] . "</td>";
                echo "<td>" . $item['quantity'] . "</td>";
                // echo "<td>" . $item['price'] . "</td>" ;
                // echo "<td>" . $item['tva'] . "</td>" ;
                echo "<td>" . _tr($item["description"]) . "</td>";
                echo "</tr>";
            }
            ?>

        </table>
    </div>
</div>




