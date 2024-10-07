<?php include "00_header.php"; ?>


<?php
// Gestion de mensajes cortos
sms($sms);

if ($error && $sms) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>

<h2><?php _t("Password"); ?></h2>

<?php if ($sms == 'update') { ?>

    <a name="next"></a>
    <?php
    if (!$error) {
        shop_registre_next(6);
    }
    ?>

<?php } else { ?>
    <p>
        <?php _t("It's time to enter your personal password, choose one that is easy to remember but difficult to guess"); ?>
    </p>

    <form class="form-horizontal" action="index.php" method="post">
        <input type="hidden" name="c" value="shop">
        <input type="hidden" name="a" value="ok_22">

        <div class="form-group">
            <label for="np" class="col-sm-3 control-label"><?php _t("User"); ?></label>
            <div class="col-sm-7">
                <input 
                    type="text" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo users_field_contact_id("login", $u_id); ?>" disabled="">
            </div>


        </div>



        <div class="form-group">
            <label for="np" class="col-sm-3 control-label"><?php _t("Password"); ?></label>
            <div class="col-sm-7">
                <input 
                    type="password" 
                    name="np" 
                    id="np" 
                    class="form-control" 
                    placeholder="" 
                    value="" required="">
            </div>

            <div class="col-sm-2">
                <input type="checkbox" onclick="showPasswordNp()"> <?php _t("Show"); ?>
            </div>
        </div>





        <div class="form-group">
            <label for="rp" class="col-sm-3 control-label"><?php _t("Repeat password"); ?></label>
            <div class="col-sm-7">
                <input 
                    type="password" 
                    name="rp" 
                    id="rp" 
                    class="form-control" 
                    placeholder="" 
                    value=""
                    required=""
                    >
            </div>

            <div class="col-sm-2">
                <input type="checkbox" onclick="showPasswordRp()"> <?php _t("Show"); ?>
            </div>

        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">


                <ul>
                    <?php
                    $error_password = passwordIsGood("");
                    if ($error_password) {
                        foreach ($error_password as $key => $value) {
                            echo "<li>" . _tr($value) . "</li>";
                        }
                    }
                    ?>
                </ul>

            </div>
        </div>

    </form>
<?php }
?>













<?php include "00_footer.php"; ?>


