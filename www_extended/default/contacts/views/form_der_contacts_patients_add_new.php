<form action ="index.php" method ="post" >

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_patients_add_new">
    <input type="hidden" name="owner_id" value="<?php echo $id; ?>">




    <div class="form-group">
        <label  for="title"><?php _t("Title"); ?></label>	
        <select class="form-control" name="title">
            <?php foreach (contacts_titles_list() as $key => $contacts_titles) { ?>
                <option value="<?php echo $contacts_titles["abbreviation"]; ?>"><?php echo ($contacts_titles['title']); ?></option>
            <?php } ?>
        </select>
    </div>



    <div class="form-group">
        <label  for="name"><?php _t("Name"); ?></label>	
        <input type="text" class="form-control" name="name" value="" placeholder="Jean Pierre">
    </div>

    <div class="form-group">
        <label  for="lastname"><?php _t("Lastname"); ?></label>	
        <input type="text" class="form-control" name="lastname" value="" placeholder="Van Acker">
    </div>

    <div class="row">

        <div class="col-xs-3">
            <select class="form-control" name="day">
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>

            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="month">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                }
                ?>

            </select>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="year">
                <?php
                for ($i = 1900; $i <= date("Y"); $i++) {
                    echo "<option value=\"$i\">$i</option>";
                }
                ?>

            </select>
        </div>
    </div>


    <div class="form-group">
        <label  for="lastname"></label>	

    </div>





    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
    </div>      							

</form>