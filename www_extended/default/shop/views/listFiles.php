<h4><?php echo _t("Files"); ?></h4>

<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Description"); ?></th>
            <th><?php _t("Side"); ?></th>
            <th><?php _t("Type"); ?></th>

        </tr>
    </thead>
    <tbody>
        <?php
        foreach (shop_files_list($id, 'all') as $file) {

            $modal_button = ' <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                see
            </button>';

            echo '<tr>';
            echo '<td align="left" ">' . $file['description'] . '</td>';
            echo '<td align="left" ">' . $file['side'] . '</td>';
            echo '<td align="left" ">' . $file['type'] . '</td>';
            //echo '<td align="left" ">' . $modal_button . '</td>';
            echo '</tr>';
        }
        ?>

    </tbody>
</table>	    			

