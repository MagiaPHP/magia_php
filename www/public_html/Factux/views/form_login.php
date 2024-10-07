<form method="post" action="index.php">

    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label for="email" class="sr-only"></label>
        <input type="text" class="form-control" id="email" name="login" placeholder="<?php _t("Email"); ?>">
    </div>

    <div class="form-group">
        <label for="password" class="sr-only"></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="<?php _t("Password"); ?>">
    </div>


    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">
            <?php _t("Log in"); ?>
        </button>
    </div>

    <div class="form-group">
        <p class="text-center">
            <a href="index.php?c=public_html&a=rp">        
                <?php _t("Forget password"); ?>
            </a>
        </p>
    </div>


    <div class="form-group">
        <hr>
    </div>


    <div class="form-group text-center">

        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#factux_registre">
            <?php _t("New account"); ?>
        </button>
    </div>
</form>






<?php include "modal_registre.php"; ?>
