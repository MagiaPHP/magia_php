<form action ="index.php" method ="post" >

    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="add">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redirection" value="index.php?contacts&a=edit&id=<?php echo $contact['id'] ?>">



    <div class="form-group">
        <label  for="name"><?php _t("Name"); ?></label>	

        <select class="form-control" name="contact_id">
            <?php foreach (contacts_list_according_company($id) as $key => $contacts_employees) { ?>

                <option value="<?php echo $contacts_employees["id"]; ?>"><?php echo contacts_formated($contacts_employees['id']); ?></option>
            <?php } ?>
        </select>

    </div>

    <div class="form-group">
        <label  for="cargo"><?php _t("Position"); ?></label>	
        <input type="text" class="form-control" name="cargo" value="" placeholder="Manager">

    </div>
    <div class="form-group">
        <label  for="cargo"><?php _t("Email"); ?></label>	
        <input type="text" class="form-control" name="cargo" value="" placeholder="Manager">

    </div>
    <div class="form-group">
        <label  for="cargo"><?php _t("Rol"); ?></label>	
        <input type="text" class="form-control" name="cargo" value="" placeholder="Manager">

    </div>
    <div class="form-group">
        <label  for="cargo"><?php _t("Password"); ?></label>	
        <input type="text" class="form-control" name="cargo" value="" placeholder="Manager">

    </div>



    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
    </div>      							

</form>