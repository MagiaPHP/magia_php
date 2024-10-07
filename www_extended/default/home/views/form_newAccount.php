<form class="form-signin" method="post">

    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_newAccount">


    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>

    <div class="form-group">
        <<<<<<< HEAD
        <label for="tva"><?php _t("Tva"); ?></label>
        <input type="text" class="form-control" name="tva" id="tva" placeholder="BE0123.123.123">
    </div>


    <div class="form-group">
        <label for="email"><?php _t("Email"); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>


    <div class="form-group">
        <label for="language"><?php _t("Language"); ?></label>
        <select class="form-control" name="language">
            <?php // _languages_select("language", "name", 'fr_BE'); ?>
            <?php
            foreach (_languages_list() as $key => $lang) {

                if ($lang['status'] == 1) {

                    $selected = ($lang['language'] == "fr_BE") ? " selected=selected " : "";

                    echo '<option value="' . $lang['language'] . '" ' . $selected . '>' . _tr($lang['name']) . '</option>';
                }
            }
            ?>

        </select>
        =======
        <input type="email" placeholder="email" name="email" class="form-control">
        >>>>>>> registre
    </div>



    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Create new account"); ?></button>


    <br>    


    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a>

        <?php if (modules_field_module('status', 'audio') && AUTO_REGISTRE) { ?>
            |  <a href="index.php?c=home&a=new_account"><?php _t("New account"); ?></a>
        <?php } ?>

    </p>

</form>