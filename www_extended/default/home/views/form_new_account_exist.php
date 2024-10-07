<form class="form-signin" method="post" >
    <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_new_sucursal">   
    <input type="hidden" name="tva" value="<?php echo $tva; ?>">   
    <input type="hidden" name="email" value="<?php echo $email; ?>">   
    <input type="hidden" name="language" value="<?php echo $language; ?>">   

    <button class="btn btn-lg btn-primary" type="submit"><?php _t("Continue"); ?></button>


    <a href="index.php" class="btn btn-lg btn-danger"><?php _t("Cancel"); ?></a>

</form>