<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php //include "izq.php"; ?>
    </div>

    <div class="col-sm-12 col-md-7 col-lg-7">

        <?php
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>

        <h1>first_connection.php</h1>

        <p>Por favor verifique que sus datos son correctos</p>

        first_connection.php
        <ul>
            <li>Avtualiza su nombre de empresa</li>
            <li>Su direccion</li>
            <li>Su directory</li>
            <li>Su nombre</li>
            <li>Su directory</li>
        </ul>
        <hr>
        <?php _t("Company name"); ?>

        <form class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2"><?php _t("Company name"); ?></label>
                <input type="text" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
            </div>




            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
            </button>
        </form>
















    </div>

    <div class="col-sm-12 col-md-3 col-lg-3">
        <?php include "der_company.php"; ?>
    </div>

</div>


<?php include view("home", "footer"); ?>  

