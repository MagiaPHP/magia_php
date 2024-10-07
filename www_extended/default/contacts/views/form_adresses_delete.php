<form class="form-horizontal" action="index.php" method="post" >

    <?php
    /*    <input type="hidden" name="c" value="contacts">
      <input type="hidden" name="a" value="ok_address_delete">
      <input type="hidden" name="id" value="<?php echo $id; ?>">
      <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
      <input type="hidden" name="address_id" value="<?php echo "$addresses_list_by_contact_id[id]"; ?>">
      <input type="hidden" name="redi" value="2"> */
    ?>

    <input type="hidden" name="c" value="addresses">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="hidden" name="contact_id" value="<?php echo $id; ?>">
    <input type="hidden" name="address_id" value="<?php echo "$addresses_list_by_contact_id[id]"; ?>">
    <input type="hidden" name="redi" value="2">


    <div class="form-group">
        <label class="control-label col-sm-0" for=""></label>
        <div class="col-sm-10">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>
