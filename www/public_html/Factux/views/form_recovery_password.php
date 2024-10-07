
<form method="post" action="index.php">


    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label for="email" class="sr-only"></label>
        <input type="text" class="form-control" id="email" name="login" placeholder="<?php _t("Vat number"); ?>">
    </div>

    <div class="form-group">
        <label for="email" class="sr-only"></label>
        <input type="text" class="form-control" id="email" name="login" placeholder="<?php _t("Email"); ?>">
    </div>




    <div class="form-group">
        <button class="btn btn-lg btn-default btn-block" type="submit">
            <?php _t("Reset password"); ?>
        </button>
    </div>

    <div class="form-group">
        <p class="text-center">
            <a href="index.php">       
                <?php _t("Home"); ?>
            </a>
        </p>
    </div>


    <div class="form-group">
        <hr>
    </div>





</form>






<?php include "modal_registre.php"; ?>
