<form class="form-signin" method="post" action="index.php">

    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_new_account">

    <div class="form-group">
        <label for="tva"><?php _t("Vat number"); ?></label>
        <input type="text" class="form-control" name="tva" id="tva" placeholder="BE0123456789" required="">
    </div>

    <div class="form-group">
        <label for="tva"><?php _t("Company name"); ?></label>
        <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Company Sol SRL" required="">
    </div>

    <div class="form-group">
        <label for="email"><?php _t("Email"); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="info@mycompany.com" required="">
    </div>



    <div class="form-group">
        <label for="email"><?php _t("Language"); ?></label>
        <select class="form-control" name="language">
            <?php
            foreach (_languages_list_by_status(1) as $key => $value) {
                echo '<option value="' . $value["language"] . '">' . _tr($value["name"]) . '</option>';
            }
            ?>
        </select>
    </div>


    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Create new account"); ?></button>

    <br>    

    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password"); ?></a> | 
        <a href="index.php?c=home"><?php _t("Login"); ?></a> |  
        <?php _t("New account"); ?>                
    </p>

</form>        


