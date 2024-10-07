<table class="table table-striped table-condensed">
    <thead>
        <tr>
            <th><?php _t("#"); ?></th>
            <th><?php _t("Date"); ?></th>
            <th><?php _t("Side"); ?></th>
            <th><?php _t("File"); ?></th>
            <th><?php _t("Use"); ?></th>
            <th><?php _t("Delete"); ?></th>

        </tr>
    </thead>
    <tbody>

        <?php
        /**
          for ($i = 1; $i < 2; $i++) { ?>
          <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo "2022-01-$i"; ?></td>
          <td><?php echo "L"; ?></td>
          <td><?php echo "30201$i-2$i-L.STL"; ?></td>
          <td><?php echo "-"; ?></td>
          <td><?php echo "Delete"; ?></td>
          </tr>
          <?php }
         * 
         */
        ?>



        <?php
        $i = 1;
        foreach (shop_files_list($id, $side) as $file) {

            $modal_button = ' <a href="www/gallery/img/scan/' . $file['file'] . '"><span class="glyphicon glyphicon-download-alt"></span> Download</a> ';

            // Copia a public_html/dropbox
            // En dropbox se hace el proceso de tratamiento de archivos STL
            //
            //--

            $modal_button_send_to_nas = ' <a href="www/gallery/img/scan/' . $file['file'] . '"><span class="glyphicon glyphicon-hdd"></span> Send to dropbox</a> ';
            //   $modal_button = _tr("Ok");


            $modal_use = '
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
  Use
</button>';

            $modal_delete = '
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal">
  Delete
</button>';

            $modal_use = "";
            $modal_delete = "";

            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td align="left" ">' . $file['date_registre'] . '</td>';
            //echo '<td align="left" ">' . $file['description'] . '</td>';
            echo '<td align="left" ">' . $file['side'] . '</td>';
            //echo '<td align="left" ">' . $file['type'] . '</td>';
            echo '<td align="left" ">' . $modal_button . '</td>';
            //    echo '<td align="left" ">' . $modal_button_send_to_nas . '</td>';
            echo '<td align="left" ">' . $modal_use . '</td>';
            echo '<td align="left" ">' . $modal_delete . '</td>';
            echo '</tr>';
            $i++;
        }
        ?>

    </tbody>
</table>	   




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Delete file</h4>
            </div>
            <div class="modal-body">
                ...


                <!-- Table -->
                <table class="table">
                    <tr>
                        <td>File</td>
                        <td>Nas</td>
                        <td>Date</td>
                    </tr>
                </table>




                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Morbi leo risus</li>
                    <li class="list-group-item">Porta ac consectetur ac</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

