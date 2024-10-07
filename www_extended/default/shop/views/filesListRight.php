<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Side"); ?></th>
            <th><?php _t("Code"); ?></th>
            <th><?php _t("Date"); ?></th>                            
            <th><span class="glyphicon glyphicon-cloud-download"></span></th>                            
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach (shop_files_list($id, 'R') as $file) {
            $cargar = ( file_exists("www/gallery/img/scan/$file[file]") ) ?
                    '<a href="www/gallery/img/scan/' . $file['file'] . '"><span class="glyphicon glyphicon-cloud-download"></span></a>' :
                    '<span class="glyphicon glyphicon-cloud-download"></span>'
            ;

            $html = '<div class="modal fade" id="modalFormFileDetailsR' . $i . '" tabindex="-1" role="dialog" aria-labelledby="modalFormFileDetailsR' . $i . '">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalFormFileDetailsR' . $i . '">
                    ' . _tr("File details") . '
                </h4>
            </div>
            <div class="modal-body">
            <div class="list-group">
                    <a href="#" class="list-group-item disabled">
                        ' . $file["description"] . '
                    </a>

                    <a href="#" class="list-group-item">Order: ' . $file["order_id"] . '</a>
                    <a href="#" class="list-group-item">Side: ' . $file["side"] . '</a>
                    <a href="#" class="list-group-item">Code: ' . $file["code"] . '</a>
                    <a href="#" class="list-group-item">Type: ' . $file["type"] . '</a>
                </div>    
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>';

            $modal_button = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFormFileDetailsR' . $i . '">
  see
</button>';

            echo '<tr>';
            echo '<td align="left" ">' . $file['side'] . '</td>';
            echo '<td align="left" ">' . $file['code'] . '</td>';
            echo '<td align="left" ">' . $file['date_registre'] . '</td>';
            echo '<td align="left" ">' . $cargar . '</td>';
            //echo '<td align="left" ">' . $file['notes'] . '</td>';
            // echo '<td align="left" ">' . $file['type'] . '</td>';
            //  echo '<td align="left" ">' . $modal_button . '</td>';
            echo '</tr>';

            echo '</tr>';
            echo "<tr>";
            echo '<td colspan=4>' . $file['notes'] . '</td>';
            echo "</tr>";

            echo $html;
            $i++;
        }
        ?>

    </tbody>
</table>	    			


