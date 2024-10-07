<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_patients_update">    
    <input type="hidden" name="id" value="<?php echo $patient["id"]; ?>">    

    <select class="selectpicker" data-live-search="true" name="title">
        <option value="null"><?php _t("Title"); ?></option>
        <?php
        //echo var_dump(contacts_titles_list());
        foreach (contacts_titles_list() as $key => $patients_titles) {

            $selected = ($patients_titles["title"] == $patient["title"]) ? " selected " : "";
            ?>
            <option value="<?php echo $patients_titles['title'] ?>" <?php echo "$selected"; ?>><?php echo $patients_titles['title'] ?></option>
        <?php } ?>
    </select>

    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text"  name="name" class="form-control" id="name" value="<?php echo $patient['name']; ?>" placeholder="<?php _t("Name"); ?>">
    </div>


    <div class="form-group">
        <label for="name"><?php _t("Lastname"); ?></label>
        <input type="text"  name="lastname" class="form-control" id="lastname" value="<?php echo $patient['lastname']; ?>" placeholder="<?php _t("Name"); ?>">
    </div>

    <div class="form-group">
        <label for="birthdate"><?php _t("Birthdate"); ?></label>                               
    </div>

    <div class="row">
        <div class="col-xs-2">
            <select class="form-control" name="day">                
                <?php
                for ($i = 1; $i <= 31; $i++) {
                    $selected_d = (dates_day_of_date($patient['birthdate']) == $i) ? " selected " : "";
                    echo "<option value=\"$i\" $selected_d >$i</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="month">
                <?php
                for ($i = 1; $i <= 12; $i++) {
                    $selected_m = (dates_month_of_date($patient['birthdate']) == $i) ? " selected " : "";
                    echo "<option value=\"$i\" $selected_m >$i " . _tr($months[$i]) . "</option>";
                }
                ?>

            </select>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="year">
                <?php
                for ($i = 1900; $i <= date("Y"); $i++) {
                    $selected_a = (dates_year_of_date($patient['birthdate']) == $i) ? " selected " : "";
                    echo "<option value=\"$i\" $selected_a >$i</option>";
                }
                ?>

            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="birthdate"></label>                               
    </div>

    <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>
</form>