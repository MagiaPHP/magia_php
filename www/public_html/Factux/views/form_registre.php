<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="subdomains">
    <input type="hidden" name="a" value="ok_registre_new">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label for="company_name" class="sr-only col-sm-0 control-label"><?php _t("Company name"); ?></label>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="name" name="name" placeholder="<?php _t("Your name"); ?>">
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="<?php _t("Your lastname"); ?>">
        </div>
    </div>




    <div class="form-group">
        <label for="company_name" class="sr-only col-sm-0 control-label"><?php _t("Company name"); ?></label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="company" name="company" placeholder="<?php _t("Company name"); ?>">
        </div>
    </div>






    <div class="form-group">
        <label for="tva" class="sr-only col-sm-0 control-label"><?php _t("Vat number"); ?></label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="tva" name="tva" placeholder="<?php _t("BE123456789"); ?>">
        </div>
    </div>





    <div class="form-group">
        <label for="email" class="sr-only col-sm-2 control-label"><?php _t("Email"); ?></label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="email" name="email" placeholder="<?php _t("info@mail.com"); ?>">
        </div>
    </div>


    <div class="form-group">
        <label for="pass" class="sr-only col-sm-2 control-label"><?php _t("Password"); ?></label>
        <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password" placeholder="<?php _t("Password"); ?>" value="">
        </div>
    </div>

    <div class="form-group">
        <label for="pass2" class="sr-only col-sm-2 control-label"><?php _t("Repete password"); ?></label>
        <div class="col-sm-12">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="<?php _t("Repete password"); ?>">
        </div>
    </div>

    <div class="form-group">
        <label for="pass2" class="sr-only col-sm-2 control-label"><?php _t("Repete password"); ?></label>
        <div class="col-sm-12">
            <p>
                <a href="#"><?php _t("Terms"); ?></a>
            </p>
        </div>
    </div>


    <div class="form-group">
        <div class=" col-sm-12">
            <button type="submit" class="btn btn-primary btn-block">
                <?php _t("Registre"); ?>
            </button>
        </div>
    </div>



</form>

