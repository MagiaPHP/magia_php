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
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>

            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><?php _t("Id"); ?></th> 
            <th><?php _t("Name"); ?></th>
            <th><?php _t("Lastname"); ?></th>

            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php
//        echo vardump($users_by_office); 

        foreach ($employees_by_office as $key => $value) {
            ?>                                        
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['lastname']; ?></td>
                <td><?php echo $value['rol']; ?></td>


                <td>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$value[id]"; ?>">
                        <?php _t("Edit"); ?>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo "$value[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$value[id]"; ?>Label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModal_<?php echo "$value[id]"; ?>Label">
                                        <?php _t("Edit data info"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php //echo "$value[id]"; ?>
                                    <?php include "form_contacts_directory_edit.php"; ?>
                                </div>                                                                               
                            </div>
                        </div>
                    </div>



                </td>
            </tr>                
        <?php } ?>                                


    </tbody>
</table>   

