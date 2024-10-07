<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_patients_new">    
    <input type="hidden" name="title" value="null">    

    <div class="form-group">       
        <select class="selectpicker" data-live-search="true" name="title">
            <option value="0"><?php _t("Select one"); ?></option>

            <?php
            //echo var_dump(contacts_titles_list());
            foreach (contacts_titles_list() as $key => $contacts_titles) {

                // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                ?>
                <option value="<?php echo $contacts_titles['abbreviation'] ?>" <?php //echo "$selected";     ?>><?php echo $contacts_titles['title'] ?></option>
            <?php } ?>
        </select>

    </div>



    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name"); ?>">
    </div>


    <div class="form-group">
        <label for="lastname"><?php _t("Lastname"); ?></label>
        <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname"); ?>">
    </div>

    <div class="form-group">
        <label for="nationalNumber"><?php _t("National number"); ?></label>
        <input type="text"  name="nationalNumber" class="form-control" id="nationalNumber" placeholder="<?php _t("63-11-02-552-96"); ?>">
    </div>

    <div class="form-group">
        <label for="birthdate"><?php _t("Birthdate"); ?></label>                               
    </div>


    <div class="row">

        <div class="col-xs-2">
            <select class="form-control" name="day" >
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
        <label for="birthdate">
        </label>                               
    </div>


    <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
</form>
