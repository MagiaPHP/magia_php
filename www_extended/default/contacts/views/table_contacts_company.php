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
            <th><?php _t("#"); ?></th>
            <th><?php _t("Company"); ?></th>
            <th><?php _t("Contact"); ?></th>
            <th><?php _t("Ref"); ?></th>                    
            <th><?php _t("Cargo"); ?></th>   
            <th><?php _t("Date"); ?></th>
        </tr>
    </thead>            


    <tbody>
        <?php foreach (employees_by_company_contact(contacts_field_id("owner_id", $id), $id) as $employees_by_company_contact) { ?>
            <tr>                                            
                <td><?php echo $employees_by_company_contact["id"]; ?></td>
                <td><?php echo contacts_formated($employees_by_company_contact['company_id']); ?></td>
                <td><?php echo contacts_formated($employees_by_company_contact['contact_id']); ?></td>
                <td><?php echo $employees_by_company_contact["owner_ref"]; ?></td>
                <td><?php echo $employees_by_company_contact["cargo"]; ?></td>
                <td><?php echo $employees_by_company_contact["date"]; ?></td>
            </tr>
        <?php } ?>                
    </tbody>  

    <?php if (!employees_by_company_contact(contacts_field_id("owner_id", $id), $id)) { ?>
        <form action ="index.php" method ="post" >

            <input type="hidden" name="c" value="contacts">
            <input type="hidden" name="a" value="contacts_employees_addOk">      
            <input type="hidden" name="contact_id" value="<?php echo $id; ?>">     
            <tr>
                <td></td>
                <td><?php echo contacts_formated(contacts_field_id("owner_id", $id)) ?></td>
                <td><?php echo contacts_formated($id) ?></td>
                <td><input class="form_control" name="owner_ref" value="ref:01" ></td>
                <td><input class="form_control" name="cargo" value="Manager" ></td>
                <td><button class="btn"><?php _t("Add"); ?></button></td>
            </tr>
        </form>



    <?php } ?>
</table>