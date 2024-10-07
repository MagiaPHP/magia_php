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
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>
            <th><?php _t("Office"); ?></th>

            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th>
            <th><?php _t("Title"); ?></th>
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>

            <th><?php _t("Office"); ?></th>

            <th><?php _t("Rol"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php
//        echo vardump($users_by_office); 

        foreach ($users_by_office as $key => $ubo) {

            $lock = ( $ubo['status'] == 0 ) ? '<i class="fas fa-lock"></i> Blocked' : "";
            ?>                                        
            <tr>
                <td><?php echo $ubo['id']; ?></td>
                <td><?php echo contacts_formated(contacts_field_id("owner_id", $ubo['contact_id'])); ?></td>
                <td><?php echo contacts_field_id("title", $ubo['contact_id']) ?></td>
                <td><?php echo $ubo['name']; ?></td>
                <td><?php echo $ubo['lastname']; ?></td>                
                <td><?php echo $ubo['rol'] . " $lock "; ?></td>


                <td>
                    <a class="btn btn-primary btn-sm" href="index.php?c=shop&a=contacts_details&id=<?php echo $ubo['id']; ?>">
                        <?php _t("Details"); ?> 
                        <?php // echo $ubo['id']; ?> 
                    </a>

                    <?php
                    /*                    <!-- Button trigger modal -->
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$ubo[id]"; ?>">
                      <?php _t("Edit"); ?>
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="myModal_<?php echo "$ubo[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$ubo[id]"; ?>Label">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModal_<?php echo "$ubo[id]"; ?>Label">
                      <?php _t("Edit data info"); ?>
                      </h4>
                      </div>
                      <div class="modal-body">
                      <?php //echo "$ubo[id]"; ?>
                      <?php include "form_contacts_directory_edit.php"; ?>
                      </div>
                      </div>
                      </div>
                      </div> */
                    ?>



                </td>
            </tr>                
        <?php } ?>                                


    </tbody>
</table>   

