<form method="post" action="index.php">
    <input type="hidden" name="c" value="balance">
    <input type="hidden" name="a" value="ok_field_update">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="field" value="client_id">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label for="client_id"><?php _t("Clients"); ?></label>
        <select class="form-control" name="new_value">
            <?php
            foreach (contacts_list_by_type(1) as $key => $con) {
                $contact = new Contacts();
                $contact->setContact($con['id']);
                $selected = ($contact->getId() == $balance['client_id']) ? " selected " : "";
                echo '<option value="' . $contact->getId() . '" ' . $selected . '>' . contacts_formated($contact->getId()) . '</option>';
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php _t("Update"); ?>
    </button>
</form>