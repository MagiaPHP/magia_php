<h3><?php _t("Address"); ?></h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th><?php _t("Company"); ?></th>            
            <th><?php _t("Possition"); ?></th>

        </tr>
    </thead>
    <tbody>


        <?php
        foreach (contacts_companies_list_according_contact($contact['id']) as $contacts_employees) {
            echo " <tr>                                            
                                    
                      <td>" . contacts_field_id("name", $contacts_employees['company_id']) . "</td>                                                                  
                      <td>$contacts_employees[position]</td>        
                  </tr>";
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
                <h4 class="modal-title" id="myModalLabel"><?php _t("Addresses"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_address_add.php"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

