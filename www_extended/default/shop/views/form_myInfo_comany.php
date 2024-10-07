<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_myInfo">

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="form-group">
                <label for="company_name"><?php _t("My name"); ?></label>
                <div class="row">
                    <div class="col-xs-3">
                        <select class="form-control" name="my_title">
                            <option value="null"></option>
                            <?php
                            //echo var_dump(contacts_titles_list());
                            foreach (contacts_titles_list() as $key => $contacts_titles) {

                                $selected = ($contacts_titles['abbreviation'] == $contact['title']) ? " selected " : "";
                                ?>
                                <option value="<?php echo $contacts_titles['abbreviation'] ?>" <?php echo "$selected"; ?>><?php echo $contacts_titles['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" name="my_name" class="form-control" placeholder="Jean Pierre" value="<?php echo $contact["name"]; ?>">
                    </div>
                    <div class="col-xs-5">
                        <input type="text" name="my_lastname" class="form-control" placeholder="Van Acker" value="<?php echo $contact["lastname"]; ?>">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="login"><?php _t("My login"); ?></label>
                <input name="" type="text" class="form-control" id="login" placeholder="login" value="<?php echo users_field_contact_id("login", $u_id); ?>" disabled="">
            </div>

            <?php /* <div class="form-group">
              <label for="login"><?php _t("My email"); ?></label>
              <input name="" type="text" class="form-control" id="login" placeholder="login" value="<?php echo users_field_contact_id("email", $u_id); ?>" disabled="">
              </div> */ ?>

            <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>

            <a type="button bt-prymaty" href="index.php?c=shop&a=changePass"><?php _t("Change password"); ?></a>

        </div>
    </div>

</form>

