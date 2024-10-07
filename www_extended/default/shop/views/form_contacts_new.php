<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_contacts_new">    
    <input type="hidden" name="title" value="null">    
    <input type="hidden" name="redi" value="1">   


    <div class="form-group">       
        <select class="selectpicker" data-live-search="true" name="title" required="">
            <option value=""><?php _t('Select one'); ?></option>

            <?php
            //echo var_dump(contacts_titles_list());
            foreach (contacts_titles_list() as $key => $contacts_titles) {

                // $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                ?>
                <option value="<?php echo $contacts_titles['title'] ?>" <?php //echo "$selected";                ?>><?php echo _tr($contacts_titles['title']); ?></option>
            <?php } ?>
        </select> *

    </div>



    <div class="form-group">
        <label for="name"><?php _t("Name"); ?> * </label>
        <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Name"); ?>" required="">
    </div>


    <div class="form-group">
        <label for="lastname"><?php _t("Lastname"); ?> * </label>
        <input type="text"  name="lastname" class="form-control" id="lastname" placeholder="<?php _t("Lastname"); ?>" required="">
    </div>

    <div class="form-group">
        <label for="birthdate"><?php _t("Birthdate"); ?></label>                               
        <div class="row">
            <div class="col-xs-3">
                <select class="form-control" name="day" required="">
                    <option value="null"><?php _t("DD"); ?></option>
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value=\"$i\">$i</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-4">
                <select class="form-control" name="month" required="">
                    <option value="null"><?php _t("MM"); ?></option>
                    <?php
                    for ($i = 1; $i <= 12; $i++) {
                        echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-5">
                <select class="form-control" name="year" required="">
                    <option value="null"><?php _t("YYYY"); ?></option>
                    <?php
                    for ($i = 1900; $i <= date("Y"); $i++) {
                        //  $selected = ($i == date('Y') - 20) ? " selected " : "" ;
                        echo "<option value=\"$i\"  >$i</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="nationalNumber"><?php _t("National number"); ?></label>
        <input type="text"  name="nationalNumber" class="form-control" id="nationalNumber" placeholder="<?php _t("63-11-02-552-96"); ?>">
    </div>

    <div class="form-group">
        <label for="dataName"><?php //_t("Directory") ;              ?></label>
        <div class="row">
            <div class="col-xs-4">
                <select class="form-control" name="dataName" id="dataName" >
                    <?php
                    foreach (directory_names_list() as $key => $directory) {
                        $selected = ($directory['name'] == "GSM") ? " selected " : "";
                        if ($directory['name'] != 'nationalNumber') {
                            ?>
                            <option value="<?php echo $directory['name']; ?>" <?php echo $selected; ?>><?php echo $directory['name']; ?></option>
                            <?php
                        }
                    }
                    ?>                    
                </select>
            </div>
            <div class="col-xs-8">
                <input type="text"  name="data" class="form-control" id="data" placeholder="<?php _t("+32474624707"); ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-default">
        <span class="glyphicon glyphicon-floppy-disk"></span>
        <?php _t("Save"); ?>
    </button>
</form>
