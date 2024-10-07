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
            <th><?php _t("Controller"); ?></th>  
            <th><?php _t("What did"); ?></th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <?php
            $logs_date_actual = null;
            $logs_date_day = null;

            //  foreach (logs_list_by_contact_id($id) as $logs) {
            foreach ($logs as $log) {


                $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              Actions
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=logs&a=details&id=' . $log["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=logs&a=edit&id=' . $log["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=logs&a=delete&id=' . $log["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>';

                $logs_date_day = date_parse_from_format('Y-m-d', $log['date'])['day'];
                $logs_date_month = date_parse_from_format('Y-m-d', $log['date'])['month'];

                //   $photo = addresses_photos_principal($address["id"]);
                //   $contact_name = contacts_field_id("name", $log["contact_id"]);
                //   $contact_lastname = contacts_field_id("lastname", $log["contact_id"]);
                echo "<tr id=\"$log[id]\">";

                if ($logs_date_actual != $logs_date_day) {
                    echo "<tr><td colspan=5><b>" . _tr("Day") . ": $logs_date_day  " . _tr(magia_dates_month($logs_date_month)) . "</b></td></tr>";
                }



                // echo "<td>$log[id]</td>";
                //   echo "<td>$log[level]</td>" ;
                echo "<td>$log[date]</td>";
                echo "<td>$log[c]</td>";
                // echo "<td>" . contacts_formated($log['u_id']) . "</td>";
                //   echo "<td>$log[u_rol]</td>" ;
                //   echo "<td>$log[c]</td>" ;
                //   echo "<td>$log[a]</td>" ;
                //   echo "<td>$log[w]</td>" ;
                echo "<td>" . substr($log['description'], 0, 110) . "... </td>";
                //    echo "<td>$log[doc_id]</td>" ;
                //   echo "<td>$log[crud]</td>" ;
                //   echo "<td>$log[error]</td>" ;
                // echo "<td>$menu</td>" ;

                echo "</tr>";

                $logs_date_actual = $logs_date_day;
            }
            ?>	
        </tr>
    </tbody>



</table>