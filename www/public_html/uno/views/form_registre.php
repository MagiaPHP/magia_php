
<form method="post" action="index.php">

    <input type="hidden" name="c" value="public_html">
    <input type="hidden" name="a" value="ok_registre">
    <input type="hidden" name="redi[redi]" value="1">

    <div class="form-group">
        <label for="name"><?php _t("Name"); ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="<?php echo _t("name"); ?>" required="">
    </div>

    <div class="form-group">
        <label for="lastname"><?php _t("Lastname"); ?></label>
        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="<?php echo _t("lastname"); ?>" required="">
    </div>

    <div class="form-group">
        <label for="name"><?php _t("Email"); ?></label>
        <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo _t("email"); ?>" required="">
    </div>

    <div class="form-group">
        <label for="name"><?php _t("Clave"); ?></label>
        , <?php _t("The password will be your email, and you must change it for security"); ?>
    </div>



    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Add like user"); ?>
    </button>

</form>
