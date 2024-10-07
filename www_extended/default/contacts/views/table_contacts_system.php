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
            <th><?php _t("IP"); ?></th>
            <th><?php _t("Last action"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>


    <tbody>
        <?php //foreach (directory_list_by_contact_id($contact['id']) as $directory_list_by_contact_id) { ?>
        <?php
        $date_actual = null;
        $date_day = null;

        foreach (logs_list_by_controller_action_user('users', 'identification', $id) as $directory_list_by_contact_id) {

            $date_day = date_parse_from_format('Y-m-d', $directory_list_by_contact_id['date'])['day'];
            $date_month = date_parse_from_format('Y-m-d', $directory_list_by_contact_id['date'])['month'];
            ?>

            <?php
            if ($date_day != $date_actual) {
                echo "<tr><td colspan=15><b>" . _tr("Day") . ": $date_day  " . _tr(magia_dates_month($date_month)) . "</b></td></tr>";
            }
            ?>


            <tr> 


                <td><?php echo "$directory_list_by_contact_id[date]"; ?></td>
                <td><?php echo "$directory_list_by_contact_id[ip4]"; ?></td>  
                <td><?php echo "$directory_list_by_contact_id[description]"; ?></td>  
                <td><a href="index.php?c=logs&a=details&id=<?php echo "$directory_list_by_contact_id[id]"; ?>"><?php echo "$directory_list_by_contact_id[id]"; ?></a></td>  




                <?php /* <td>  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>">
                  <?php _t("Edit"); ?>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                  <div class="modal-dialog" role="document">
                  <div class="modal-content">
                  <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModal_<?php echo "$directory_list_by_contact_id[id]"; ?>Label">
                  <?php _t("Edit data info"); ?>
                  </h4>
                  </div>
                  <div class="modal-body">
                  <?php //echo "$directory_list_by_contact_id[id]"; ?>
                  <?php include "form_contacts_directory_edit.php"; ?>
                  </div>
                  </div>
                  </div>
                  </div>
                 * 
                  </td>

                 */ ?>




            </tr>
            <?php
            $class_status = ""; // reseteo las variables 
            $date_actual = $date_day;
        }
        ?>
    </tbody>  
</table>

