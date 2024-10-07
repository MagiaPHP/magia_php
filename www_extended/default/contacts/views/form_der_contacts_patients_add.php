<form action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="patientAddOk">
    <input type="hidden" name="company_id" value="<?php echo $contact['id'] ?>">




    <div class="form-group">
        <label  for="name"><?php _t("Name"); ?></label>	
        <select class="form-control" name="contact_id">
            <?php
            $patients_list_according_company = patients_list_according_company($id);

            foreach (contacts_list_according_company($id) as $key => $contacts_list_according_company) {
                if (!in_array($contacts_list_according_company['id'], array_column(patients_list_according_company($id), 'contact_id'))) {
                    ?>
                    <option value="<?php echo $contacts_list_according_company["id"]; ?>"><?php echo contacts_formated($contacts_list_according_company['id']); ?></option>
                <?php
                }
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label  for="cargo"><?php _t("company_ref"); ?></label>	
        <input type="text" class="form-control" name="company_ref" value="" placeholder="">
    </div>





    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
    </div>      							

</form>