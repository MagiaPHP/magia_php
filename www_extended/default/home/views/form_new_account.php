
<form class="form-signin" method="post">

    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_new_account">




    <p class="text-center">
        <?php logo(200, "img-responsive"); ?>
    </p>

    <h2 class="form-signin-heading text-center"><?php _t("New account"); ?></h2>

    <div class="form-group">
        <label for="tva"><?php _t("Tva"); ?></label>
        <input type="text" class="form-control" name="tva" id="tva" placeholder="BE0123123123">
    </div>


    <div class="form-group">
        <label for="email"><?php _t("Email"); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>


    <div class="form-group">
        <label for="language"><?php _t("Language"); ?></label>
        <select class="form-control" name="language">
            <?php
            foreach (_languages_list() as $key => $lang) {

                $selected = ($lang == "fr_BE") ? " selected " : "";
                if ($lang['status']) {
                    ?>
                    <option value="<?php echo $lang['language'] ?>" ><?php _t($lang['name']); ?></option>

                    <?php
                }
            }
            ?>


        </select>
    </div>


    <div class="form-group">
        <label for="email"><?php _t("Invitation code"); ?></label>
        <input type="text" class="form-control" name="ic" id="ic" placeholder="">
    </div>





    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Create new account"); ?></button>


    <br>    


    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a> |  
        <?php _t("New account"); ?>                
    </p>

</form>        


