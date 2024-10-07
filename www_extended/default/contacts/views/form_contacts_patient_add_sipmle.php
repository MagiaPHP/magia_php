<form action="index.php" method="post">            
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_employees_add">
    <input type="hidden" name="company_id" value="<?php echo $id; ?>">
    <input type="hidden" name="owner_ref" value="-">
    <tr>
        <td></td>
        <td>
            <select class="form-control" name="contact_id">
                <?php foreach (contacts_list_according_company($id) as $key => $contacts_employees) { ?>

                    <option value="<?php echo $contacts_employees["id"]; ?>"><?php echo contacts_formated($contacts_employees['id']); ?></option>
                <?php } ?>
            </select>
        </td>

        <td>
            <input type="text" name="cargo" value="" placeholder="Manager">
        </td>
        <td>
            <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
        </td>
    </tr>
</form>


