  
<?php
foreach (contacts_list_according_company($id)as $contacts_list_according_company) {
    $is_patient = (patients_according_company_contact($id, $contacts_list_according_company['id'])) ? "yes " : "-";
    $is_employee = (employees_by_company_contact($id, $contacts_list_according_company['id'])) ? "yes" : "-";
    $is_rol = (users_according_contact_id($contacts_list_according_company['id'])) ? "yes" : "-";
    ?>                     
    <?php if ($contacts_list_according_company['type'] == 0) { ?>
        <tr>                                            
            <td><?php echo $contacts_list_according_company['id']; ?></td>
            <td><?php echo $contacts_list_according_company['name']; ?></td>
            <td><?php echo $contacts_list_according_company['lastname']; ?></td>
            <?php if (modules_field_module('status', 'audio')) { ?>
                <td><?php echo $is_patient; ?></td>    
            <?php } ?>
            <td><?php echo $is_employee; ?></td>                          
            <td><?php echo $is_rol; ?></td>                          
            <td>
                <a 
                    class="btn btn-sm btn-default" 
                    href="index.php?c=contacts&a=details&id=<?php echo $contacts_list_according_company['id']; ?>">
                        <?php _t("Details"); ?>
                </a>
            </td>
        </tr>
    <?php } ?>

<?php } ?>
