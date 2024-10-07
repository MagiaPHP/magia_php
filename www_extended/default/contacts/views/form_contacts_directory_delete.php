<form action="index.php" method="post">
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_directory_delete">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="name" value="<?php echo "$directory_list_by_contact_id[name]"; ?>">
    <input type="hidden" name="data" value="<?php echo "$directory_list_by_contact_id[data]"; ?>">
    <input type="hidden" name="redi" value="3">



    <?php
//echo "$directory_list_by_contact_id[data]";
//
//echo "$directory_list_by_contact_id[name]";


    /*
      <div class="form-group">
      <label for="name"><?php _t("Type"); ?></label>
      <select name="name" class="form-control"    >
      <option value="<?php echo "$directory_list_by_contact_id[name]"; ?>">
      <?php echo "$directory_list_by_contact_id[name]"; ?>
      </option>
      </select>
      </div>

      <div class="form-group">
      <label for="data"><?php _t("Data"); ?></label>
      <input
      type="text"
      name="data"
      class="form-control"
      id="data"
      value="<?php echo "$directory_list_by_contact_id[data]"; ?>"
      placeholder="<?php echo "$directory_list_by_contact_id[data]"; ?>"
      readonly=""
      >
      </div> */
    ?>

    <button type="submit" class="btn btn-danger">
        <span class="glyphicon glyphicon-trash"></span>
        <?php _t("Delete"); ?>
    </button>
</form>
