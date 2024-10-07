<table class="table table-striped">
    <thead>
        <tr>

            <th><?php _t("Address"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>

            <th><?php _t("Address"); ?></th>
            <th><?php _t("Action"); ?></th>
        </tr>
    </tfoot>
    <tbody>                
        <?php
        // vardump(($id)); 
        // vardump(directory_list_by_contact_id($id)); 
        //foreach (directory_list_by_contact_id($id) as $key => $addresses_list_by_contact_id) {                                        
        foreach (addresses_list_by_contact_id($id) as $key => $addresses_list_by_contact_id) {
            ?>                                        

            <tr>                
                <td>                
                    <?php echo $addresses_list_by_contact_id['number']; ?>, <?php echo $addresses_list_by_contact_id['address']; ?> <br>
                    <?php echo $addresses_list_by_contact_id['postcode']; ?> - <?php echo $addresses_list_by_contact_id['barrio']; ?><br>
                    <?php echo $addresses_list_by_contact_id['city']; ?> <?php echo $addresses_list_by_contact_id['country']; ?>                
                </td>
                <td>



                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_<?php echo "$addresses_list_by_contact_id[id]"; ?>">
                        <?php _t("Edit"); ?>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal_<?php echo "$addresses_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModal_<?php echo "$addresses_list_by_contact_id[id]"; ?>Label">
                                        <?php _t("Edit data info"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php //echo "$addresses_list_by_contact_id[id]";  ?>
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
