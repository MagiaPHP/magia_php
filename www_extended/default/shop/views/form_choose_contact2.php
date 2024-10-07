<form action="index.php" method="" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="contacts_search">
    <input type="hidden" name="formId" value="nav">
    <input type="hidden" name="show_office" value="0">

    <div class="form-group">
        <input 
            name="txt" 
            type="search" 
            class="form-control" 
            placeholder="<?php _t("Search"); ?>" 
            autofocus 
            required=""
            >
    </div>
    <?php /*
      <div class="form-group">
      <select name="txt"  class="selectpicker" data-live-search="true">
      <?php
      foreach (shop_labo_patients_list() as $key => $patients_list) {
      echo "<option value=\"$patients_list[contact_id]\">$patients_list[contact_id] ". contacts_formated($patients_list[contact_id])."</option>";
      }
      ?>
      </select>
      </div>
     * 
     * 
     * */ ?>
    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-search"></span>
        <?php _t("Search"); ?>
    </button>
</form>