<form method="post" action="index.php" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_employee_add">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">




    <div class="form-group">
        <label for="login"><?php echo _t("Office"); ?></label>
        <?php
        /* <select name="company_id" class="form-control">

          <?php
          foreach (contacts_list_according_company_and_type(contacts_headoffice_of_contact_id($u_id), 1) as $key => $value) { ?>
          <option value="<?php echo ($value['id']); ?>"><?php echo contacts_formated($value['id']); ?></option>
          <?php }
          ?>
          </select> */
        ?>
        <input 
            type="text" 
            name="" 
            class="form-control" 
            id="" 
            placeholder="" 
            value="<?php echo contacts_formated(contacts_field_id("owner_id", $id)); ?>"
            disabled=""
            >
    </div>


    <div class="form-group">
        <label for=""><?php echo _t("Reference"); ?></label>
        <input 
            type="text" 
            name="owner_ref" 
            class="form-control" 
            id="owner_ref" 
            placeholder="owner_ref" 
            value=""
            >
    </div>





    <div class="form-group">
        <label for="rol"><?php echo _t("Position in the company"); ?></label>
        <input 
            type="text" 
            name="cargo" 
            class="form-control" 
            id="cargo" 
            placeholder="Manager, secretary" 
            value=""
            >
    </div>



    <div class="form-group">
        <label for="password"></label>
        <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
    </div>




</form>






