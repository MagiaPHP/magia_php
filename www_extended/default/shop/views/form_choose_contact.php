<form action="index.php" method="post" class="form-inline">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_order_new_chosse_contact">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="sr-only" for="contact_id"></label>
        <select name="contact_id"  class="selectpicker" data-live-search="true">
            <?php
            //foreach (shop_labo_contacts_list() as $key => $shop_labo_contacts_list) {
            foreach (shop_patients_list_by_office() as $key => $shop_labo_contacts_list) {

                if ((!contacts_is_anonymus($shop_labo_contacts_list['id'], contacts_work_at($u_id)))) { // si no es anonymus, se muestra
                    ?>
                    <option value="<?php echo $shop_labo_contacts_list['id']; ?>" ><?php echo contacts_formated($shop_labo_contacts_list['id']); ?></option>
                    <?php
                }
            }
            ?>
        </select>
    </div> 

    <?php
    // vardump(shop_patients_list_by_office());
    /**
     *  <div class="form-group">
      <label class="sr-only" for="contact_id"></label>
      <select name="contact_id"  class="selectpicker" data-live-search="true">
      <option value="notemplate"><?php _t("No Template"); ?></option>
      <option value="1"><?php _t("Template 1"); ?></option>
      <option value="2"><?php _t("Template 2"); ?></option>
      <option value="3"><?php _t("Template 3"); ?></option>
      </select>
      </div>

     */
    ?>



    <button type="submit" class="btn btn-default"><?php echo _t("Next >>"); ?></button>

</form>


